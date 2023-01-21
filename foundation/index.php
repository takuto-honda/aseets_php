<?php 
// //出力
// echo 'test';
// //数字
// echo 10;
// //改行
// echo '<br>';
// //文字
// echo '文字です';

// //変数
// $variable = '変数です。';
// echo $variable;
// echo '<br>';
// $variable = '値が変わります。';
// echo $variable;
// echo '<br>';

// //定数
// const CONSTANT = '値は変わりません。';
// const CONSTANT = '値よ変われ！';
// echo CONSTANT;

// デバッグ
// echo
// print_r
// var_dump()
// echo '<pre>';var_dump();echo '</pre>';exit;

// // 配列
// $array = [1,2,3];
// echo $array[0];
// echo '<br>';
// echo $array[1];
// echo '<br>';
// echo $array[2];

// echo '<pre>';var_dump($array);echo '</pre>';exit;

// $array2 = [
//   ['赤','青','黄'],
//   ['緑','紫','黒']
// ];
// //赤
// echo $array2[0][0];
// //黒
// echo $array2[1][2];
// echo '<pre>';var_dump($array2);echo '</pre>';exit;


// //連想配列
// $array_member = [
//   'name' => '本田',
//   'height' => '166',
//   'hobby' => 'Programming'
// ];
// // 本田
// echo $array_member['name'];
// echo '<pre>';var_dump($array_member);echo '</pre>';exit;

// $array_member2 = [
//   '1class' => [
//     '本田' => [
//       'height' => 166,
//       'hobby' => 'Programming'
//     ],
//     '香川' => [
//       'height' => 170,
//       'hobby' => 'サッカー'
//     ]
//   ],
//   '2class' => [
//     '佐藤' => [
//       'height' => 172,
//       'hobby' => '野球'
//     ],
//     '黒田' => [
//       'height' => 174,
//       'hobby' => '空手'
//     ]
//   ]
// ];
// //本田くんの身長
// echo $array_member2['1class']['本田']['height'];
// //黒田くんの趣味
// echo $array_member2['2class']['黒田']['hobby'];

// echo '<pre>';var_dump($array_member2);echo '</pre>';exit;

//四則演算子
// +,-,*,/,%
//比較演算子
// >,>=,+=,===,!==
//論理演算子
// and,&&,or,||
//++

// //条件分岐
// $weight = 64;

// if($weight > 80){
//   echo '体重は80kg以上です';
// }elseif($weight > 60){
//   echo '体重は80kg未満,60kg以上です';
// }else{
//   echo '体重は60kg未満です';
// }

// //繰り返し処理
// $mambers = ['本田', '黒田'];
// foreach($mambers as $mamber){
//   echo $mamber;
//   echo '<br>';
// }

// $members2 = [
//   '本田' => '拓斗',
//   '黒田' => '真道'
// ];

// foreach($members2 as $first_name => $last_name){
//   echo 'メンバーは'. $first_name . $last_name;
//   echo '<br>';
// }
// echo 'の'.count($members2).'人です。';

// for($i = 0; $i < 10; $i++){
//   // if($i === 5){
//   //   //処理を止める
//   //   // break;
//   //   //処理をスキップする
//   //   // continue;
//   // }
//   echo $i;
// }

// $j = 0;
// while($j < 5){
//   echo $j;
//   $j++;
// }

// $j = 10;
// switch($j){
//   case 1:
//     echo '1です';
//     break;
//   case 10:
//     echo '10です';
//     break;
//   case 100:
//     echo '100です';
//     break;
//   case 1000:
//     echo '1000です';
//     break;
//     default:
//     echo 'どれでもありません';
// }

// //関数
// //自作関数
// function testSum($input1, $input2){
//   $sum = $input1 + $input2;
//   return $sum; 
// }
// $one = 1;
// $two = 2;
// echo testSum($one, $two);

// //組み込み関数
// // 文字列の長さを取得
// echo $text_length = 'こんにちは。この文字列の長さを出力しましょう！';
// echo '<br>';
// echo mb_strlen($text_length);

// function checkPostalCode($str){
//   $replaced = str_replace('-','',$str);
//   $length = strlen($replaced);

//   if($length === 7){
//     return 'OK';
//   }
//   return 'NO';
// }

// $postalcode = '123-4567';
// echo checkPostalCode($postalcode);

// //スコープ
// //グローバルはグローバル、ローカルはローカル
// $globalVariable = 'グローバル変数です。';

// function checkScorp(){
//   return $locallVariable = 'ローカル変数';
// }

// echo $globalVariable;
// echo '<br>';
// echo checkScorp();

// //ファイルの読み込み
// //ディレクトリまで表示
// echo __DIR__; // /Applications/MAMP/htdocs/aseets/aseets_php
// //ファイル名まで表示
// echo __FILE__; // /Applications/MAMP/htdocs/aseets/aseets_php/index.php

// //エラー
// require('call.php');
// //警告
// include('call.php');



?>
