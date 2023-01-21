<?php
  // インターフェース メソッドの強制しかかけない
  // インターフェースの作成は
  // interface インターフェース名
  interface ProductInterface{
    public function getProduct();
  }
  interface NewsProductInterface{
    public function getNews();
  }

  //インターフェースの使用
  //子クラス implements 親クラス
  //クラスは継承は1クラスしかできないがインターフェースはいくつでも可能
  class Product implements ProductInterface, NewsProductInterface{

    private $product = [];

    function __construct($product)
    {
      $this->product = $product;
    }
    //インターフェース内で指定されているため必ず使用しなければならない
    //使用しなければエラーが発生する
    public function getProduct(){
      echo $this->product;
    }
    public function getNews(){
      echo $this->product;
    }
  }

  $instance = new Product('テスト');

  $instance->getProduct();
  echo '<br>';

  $instance->getNews();