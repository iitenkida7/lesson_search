<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once('../words.php' );
$words =  new Aflo\Words;


if ($_POST['words']){
    //TODO input_fileter とか何かしらの制約を入れる。
    $words->regist($_POST['words']);
} elseif($_POST['keyword']){
    $searchResults = $words->search($_POST['keyword']);
    print_r($searchResults);
}

// view
require_once(__DIR__ . '/../view/index.php');