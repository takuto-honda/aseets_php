<?php
//一度だけautoload.phpファイルを読み込む
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\TestController;

$app = new TestController;
echo $app->useModel();