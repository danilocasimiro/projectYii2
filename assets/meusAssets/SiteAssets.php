<?php 

namespace app\assets\meusAssets;

use yii\web\AssetBundle;

class SiteAssets extends Assetbundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $css = [
    'css\all.min.css',
    'css\sb-admin-2.min.css'
  ];

  public $js = [
    'js\bootstrap.bundle.min.js',
    'js\jquery.easing.min.js',
    'js\jquery.min.js',
    'js\sb-admin-2.min.js'
  ];

  public $depends = [
    'yii\web\JqueryAsset'
  ];
}