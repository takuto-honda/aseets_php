<?php
  // 抽象クラス 設定するメソッドを強制
  abstract class ProductAbstract{
    public function parentProduct(){
      echo '親クラスです';
    }
    //abstractをつけたメソッドは必ず使用しなければならない
    abstract public function getProduct();

  }

  //具象クラス
  class Product extends ProductAbstract{

    private $product = [];

    function __construct($product)
    {
      $this->product = $product;
    }
    //抽象クラス内で指定されているため必ず使用しなければならない
    //使用しなければエラーが発生する
    public function getProduct(){
      echo $this->product;
    }

    public function addProduct($item){
      echo $this->product .= $item;
    }

    public static function getStaticProduct($str){
      echo $str;
    }

  }

  $instance = new Product('テスト');

  $instance->getProduct();
  echo '<br>';

  $instance->addProduct('アイテムの追加');
  echo '<br>';

  Product::getStaticProduct('静的');
  echo '<br>';

  $instance->parentProduct();