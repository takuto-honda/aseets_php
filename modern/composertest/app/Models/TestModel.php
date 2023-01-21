<?php
//namespace 
//namespaceの作成 namespace ディレクトリパス
namespace App\Models;

//クラス名はファイル名と同じにする必要がある
//1ファイル1クラス
class TestModel
{
  private $text = 'Hello Model';

  public function getModel(){
    return $this->text;
  }
}