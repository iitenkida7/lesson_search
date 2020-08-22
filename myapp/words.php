<?php

namespace Search;

class Words
{
    use Database;

    public function regist(string $inputWords)
    {
        $words = $this->splitWords($inputWords);
        if (count($words) > 0) {
            $this->insertWords($words);
        }
        return $this->searchWords($words[0]);
    }

    public function search(string $keyword): array
    {
        return $this->searchWords($keyword);
    }

    private function splitWords(string $words): array
    {
        return explode(' ', $words);
    }

    private function insertWords(array $words): bool
    {
        $this->pdo->beginTransaction();
        $stn = $this->pdo->prepare("INSERT INTO aggregations (id) VALUE(NULL)");
        $stn->execute([$word]);
        $aggregationsId = $this->pdo->lastInsertId('id');
        $stn = $this->pdo->prepare("INSERT INTO words (aggregations_id, word) VALUES(?,?)");

        foreach ($words as $word) {
            $stn->execute([$aggregationsId, $word]);
        }
        return $this->pdo->commit();
    }

    private function searchWords(string $keyword): array
    {
        // TODO 要件は満たせて位相だけど、DISTINCT で １グループだけ検索に引っかかるように強制してしまっているので、
        // aggregations が 複数出てくるように 拡張してあげてもいいかも。
        $stn = $this->pdo->prepare("
          SELECT DISTINCT word FROM words
           WHERE aggregations_id IN (
                  SELECT DISTINCT aggregations_id 
                    FROM words
                   WHERE word LIKE ? )");
        $stn->execute([$keyword]);

        $words = [];
        foreach ($stn->fetchAll(\PDO::FETCH_ASSOC) as $value ){
            $words[] = $value['word'];            
        }
        return $words;
    }
}