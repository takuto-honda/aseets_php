<?php
  //クラス
  class Product{
    //アクセス修飾子
    //public クラスの外からアクセス可能
    //private 定義したクラス内のみアクセス可能
    //protected 継承クラス（子クラス）からもアクセス可能

    //変数(プロパティ)
    private $product = [];
    //関数(メソッド)
    //__construct 初回に呼び出す
    function __construct($product)
    {
      //$thisはこのクラス(Productクラスを指す)
      //->はアロー演算子(プロパティやメソッドにアクセスする)
      //productはプロパティ(変数)を指す
      $this->product = $product;
    }

    public function getProduct(){
      echo $this->product;
    }

    public function addProduct($item){
      $this->product .= $item;
    }

    public static function getStaticProduct($str){
      echo $str;
    }
  }

  //インスタンス
  //new クラス名でインスタンス化
  $instance = new Product('テスト');

  //動的 インスタンス名->関数名()
  //インスタンスに対して呼び出し、インスタンス毎に固有の結果を返す。
  $instance->getProduct();
  echo '<br>';

  $instance->addProduct('アイテムの追加');
  echo '<br>';

  //静的(static) クラス名::関数名
  //呼び出しはクラスに対して行い、どこで呼び出しても同じ処理を行う。
  Product::getStaticProduct('静的');
  echo '<br>';