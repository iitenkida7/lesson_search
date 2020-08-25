<?php
require_once(__DIR__ . '/../vendor/autoload.php');
use Jenssegers\Blade\Blade;

$words =  new Search\Words;

if ($_POST['words']) {
    //TODO input_fileter とか何かしらの制約を入れる。
    $searchResults = $words->regist($_POST['words']);
} elseif ($_POST['keyword']) {
    $searchResults = $words->search($_POST['keyword']);
}
echo (new Blade('../views', '../cache'))->make('index', [
    'keyword'       => $_POST['keyword'],
    'searchResults' => $searchResults > 0 ? implode(" ", $searchResults) : "",
])->render();
