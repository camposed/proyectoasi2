<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use util\MenuMaker;




AppAsset::register($this);
	$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon.png']);
	$this->registerJsFile(Yii::$app->request->baseUrl.'/js/Chart.min.js',['depends' => [\yii\web\JqueryAsset::className()],'position'=>\yii\web\View::POS_END]);
	$this->registerJsFile(Yii::$app->request->baseUrl.'/js/index.js',['depends' => [\yii\web\JqueryAsset::className()],'position'=>\yii\web\View::POS_END]);
	
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/reset.css" rel="stylesheet" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo-blanco.png',['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (['label' => 'Logeo', 'url' => ['/site/login']]) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div id="wrapper">
        <!--  //Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],])  -->

        <!-- Sidebar -->

        <?php if(!Yii::$app->user->getIsGuest()){ ?>
        <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <?= MenuMaker::make(yii::$app->user->id) ?>
                </ul>
        </div>
        <?php }?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <?= $content ?>
            </div>

        </div>
    </div>
</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
