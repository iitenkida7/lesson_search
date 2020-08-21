<?php

namespace Aflo;

class Words
{
    use Database;

    public function regist(string $inputWords)
    {
        $words = $this->splitWords($inputWords);
        if (count($words) > 0) {
            $this->registWords($words);
        }
        return ;
    }

    private function splitWords(string $words): array
    {
        return explode(' ', $words);
    }

    private function registWords(array $words): bool
    {
        
        $this->pdo->exec("INSERT INTO aggregations (id)");
        
        //$pdoWords = $this->pdo->prepare("INSERT INTO words (id, aggregations_id, words) VALUES(0, LAST_INSERT_ID(),?)");
        $pdoWords = $this->pdo->prepare("INSERT INTO words (id, aggregations_id, words) VALUES(0, 1,?)");
        $this->pdo->beginTransaction();
        foreach ($words as $word) {
          $pdoWords->execute([$word]);
        }
        return $this->pdo->commit();
    }
}