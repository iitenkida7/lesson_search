<?php

namespace Aflo;

class Words
{
    use Database;

    public function regist(string $inputWords)
    {
        $words = $this->splitWords($inputWords);
        if (count($words) > 0) {
            $this->insertWords($words);
        }
        return ;
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
}