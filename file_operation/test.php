<?php
// $contactFile = '.contact.dat';
// //ファイルの中身を取得する
// $fileContents = file_get_contents($contactFile);

// // echo $fileContents;

// $addText = 'テストです' . "\n";

// //ファイルに書き込み(上書き)
// // file_put_contents($contactFile, 'テストを追加！');
// //ファイルに書き込み(追記)
// file_put_contents($contactFile, $addText, FILE_APPEND);

// 配列
$contactFile = '.csv.dat';
$allData = file($contactFile);

foreach($allData as $lineData){
  $lines = explode(',', $lineData);
  echo $lines[0]. '<br>';
  echo $lines[1]. '<br>';
  echo $lines[2]. '<br>';
}