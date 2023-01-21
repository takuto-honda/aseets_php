<?php
function insertContact($request){
  require 'db_connection.php';

  $params = [
    'id' => null,
    'name' => $request['name'],
    'email' => $request['email'],
    'gender' => $request['gender'],
    'age' => $request['age'],
    'contact' => $request['contact'],
    'created_at' => null,
  ];

  $count = 0;
  $columns = '';
  $values = '';
  //array_keysで$paramsのキーを取得
  foreach(array_keys($params) as $key){
    if($count++){
      $columns .= ',';
      $values .= ',';
    }
      $columns .= $key;
      $values .= ':'.$key;
  }
  $sql = 'insert into contacts('. $columns .')values('. $values .')';
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
}