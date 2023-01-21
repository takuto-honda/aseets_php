<?php

require 'db_connection.php';

// // ユーザー入力あり query
// $sql = 'select * from contacts where id =1';//SQLのセット
// $stmt = $pdo->query($sql);//SQL実行 ステートメント

// $result = $stmt->fetchall();//実行結果を取得

// echo '<pre>';var_dump($result);echo '</pre>';exit;//結果を表示

// ユーザー入力なし prepare, bind, excute
// $sql = 'select * from contacts where id =:id';//SQLのセット :idはプレースホルダー
// $stmt = $pdo->prepare($sql);//SQL文の準備
// $stmt->bindValue('id', 1, PDO::PARAM_INT);//:idと1を紐付ける&&型指定
// $stmt->excute();//SQL実行

//トランザクション

// $pdo->beginTransaction(); //トランザクション開始

// try{
//   $pdo->commit();//まとめて実行
// }catch(PDOException $e){

//   $pdo->rollback();//ロールバック
// }