<?php
require_once(__DIR__ . '/../vendor/autoload.php');
$words =  new Search\Words;

if ($_POST['words']) {
    //TODO input_fileter とか何かしらの制約を入れる。
    $searchResults = $words->regist($_POST['words']);
} elseif ($_POST['keyword']) {
    $searchResults = $words->search($_POST['keyword']);
}

// view
require_once(__DIR__ . '/../view/index.php');
