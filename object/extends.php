<?php
  // 親クラス・基底クラス・スーパークラス
  class BaseProduct{
    public function parentProduct(){
      echo '親クラスです';
    }

    //オーバーライド(上書き)
    //子クラスに同じ関数があるためこちらは使用されない
    //子クラスのメソッドがオーバーライド(上書き)されている
    public function getProduct(){
      echo 'オーバーライドテスト';
    }

    // public function publicProduct(){
    //   echo 'パブリックメソットです';
    // }

    protected function protectedProduct(){
      echo 'プロテクテッドメソットです';
    }

    // private function privateProduct(){
    //   echo 'プライベートメソットです';
    // }
  }
  //finalはもうこのクラスやメソッドは継承できないという意味
  // final class BaseProduct{
  //   public function parentProduct(){
  //     echo '親クラスです';
  //   }

  //   final public function getProduct(){
  //     echo 'オーバーライドテスト';
  //   }
  // }

  // 子クラス・派生クラス・サブクラス
  // 子クラス名 extends 親クラス名で継承
  // 親クラスのメソッドやプロパティが使用できる
  class Product extends BaseProduct{

    private $product = [];

    function __construct($product)
    {
      $this->product = $product;
    }

    public function getProduct(){
      //parantキーワードを使用することで親クラスのメソッドを上書きせず使用できる
      // parent::getProduct();
      echo $this->product;
    }

    public function addProduct($item){
      echo $this->product .= $item;
    }

    public static function getStaticProduct($str){
      echo $str;
    }

    public function publicProduct(){
      echo 'パブリックメソットです';
    }

    // protected static function protectedProduct(){
    //   echo 'プロテクテッドメソットです';
    // }

    public function getProtectedProduct(){
      echo $this->protectedProduct();
    }

    private function privateProduct(){
      echo 'プライベートメソットです';
    }

  }

  $instance = new Product('テスト');

  $instance->getProduct();
  echo '<br>';

  $instance->addProduct('アイテムの追加');
  echo '<br>';

  Product::getStaticProduct('静的');
  echo '<br>';

  //呼び出せる
  $instance->publicProduct();
  echo '<br>';
  // //エラー
  // $instance->protectedProduct();
  
  // 呼び出せる
  $instance->getProtectedProduct();
  echo '<br>';
  
  // //エラー
  // $instance->privateProduct();

  //親クラスの呼び出し
  $instance->parentProduct();