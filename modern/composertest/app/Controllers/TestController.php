<?php

namespace App\Controllers;

use App\Models\TestModel;

class TestController
{
  public function useModel(){
    $model = new TestModel;
    echo $model->getModel();
  }
}

