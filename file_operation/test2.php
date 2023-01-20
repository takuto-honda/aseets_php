<?php
$contactFile = '.contact.dat';
// ファイルを開き第2引数モードを指定
$contacts = fopen($contactFile, 'a+');

$addText = '1行追記' . "\n";
//fwriteで追記
fwrite($contacts, $addText);
// fcloseでファイルを閉じる 
fclose($contacts);

