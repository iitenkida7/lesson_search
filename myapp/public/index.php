<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once('../words.php' );
$words =  new Aflo\Words;
require_once(__DIR__ . '/../view/regist.php');

if ($_POST['words']){
    //TODO input_fileter とか何かしらの成約を入れる。
    echo $words->regist($_POST['words']);
}


