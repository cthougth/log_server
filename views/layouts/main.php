<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="main">
    <div class="header">
        <div class="menu">
            <ul>
                <li><a href="#">首页</a></li>
            </ul>
        </div>
        <div class="menu-picture">
            <div class="menu-title">
                <span>个人笔记</span>
            </div>
        </div>
    </div>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<div class="footer">

</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
