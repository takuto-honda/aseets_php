<?php
//トレイト
//コードを再利用するための仕組み
//トレイトの作成 trait トレイト名
trait ProductTrait{
  public function getProduct(){
    echo 'プロダクト';
  }
}

trait NewsTrait{
  public function getNews(){
    echo 'News';
  }
}

class Product{
  //トレイトの使用方法
  //use トレイト名;
  use ProductTrait;
  use NewsTrait;

  public function getInformation(){
    echo 'クラス';
  }

  // //オーバーライドも可能
  // public function getNews(){
  //   echo 'オーバーライドのNews';
  // }
}
  $product = new Product();

  $product->getInformation();
  echo '<br>';
  $product->getProduct();
  echo '<br>';
  $product->getNews();
  echo '<br>';