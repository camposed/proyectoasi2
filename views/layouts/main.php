<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
//use app\assets\AppAsset;
use util\MenuMaker;

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


     <!-- Bootstrap core CSS     -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/themify-icons.css" rel="stylesheet">

<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-1.10.2.js" type="text/javascript"></script>
    

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrapper">


    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Departamento de Desechos Sólidos
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <?php echo Html::a('<i class="ti-panel"></i><p>Inicio</p>',["site/main"]); ?>
                </li>
                <li>
                    <?php echo Html::a('<i class="ti-user"></i><p>Usuarios</p>',["usuario/index"]); ?>
                </li>
                <li>
                    <?php echo Html::a('<i class="ti-clipboard"></i><p>Roles</p>',["rol/index"]); ?>
                </li>
                <li>
                    <?php echo Html::a('<i class="ti-folder"></i><p>Cargos</p>',["cargo/index"]); ?>
                </li>
                <li>
                    <?php echo Html::a('<i class="ti-archive"></i><p>Empleados</p>',["empleado/index"]); ?>
                </li>
                <li>
                    <?php echo Html::a('<i class="ti-calendar"></i><p>Planes</p>',["plan/index"]); ?>
                </li>
                <li>
                    <?php echo Html::a('<i class="ti-map"></i><p>Rutas</p>',["ruta/index"]); ?>
                </li>
				<li>
                    <?php echo Html::a('<i class="ti-home"></i><p>Colonias</p>',["colonia/index"]); ?>
                </li>
				<li>
                    <?php echo Html::a('<i class="ti-location-pin"></i><p>Distritos</p>',["distrito/index"]); ?>
                </li>
				<li>
                    <?php echo Html::a('<i class="ti-list"></i><p>Tipos</p>',["tipo/index"]); ?>
                </li>
				<li>
                    <?php echo Html::a('<i class="ti-file"></i><p>Tablas</p>',["catalogo-tabla/index"]); ?>
                </li>
				<li>
                    <?php echo Html::a('<i class="ti-pencil"></i><p>Estados</p>',["estado/index"]); ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sistema</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">


    <?= $content ?>


    </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            
                                Proyecto Análisis de Sistemas 2 - UFG
                            
                        </li>
                        
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
                </div>
            </div>
        </footer>

    </div>


<div class="site-index" style="display:none;">

    <div class="jumbotron"></div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-onbox">
                        <h4>Tonelaje Recolectado</h4>
                        <p>
                            <canvas id="tonelaje-chart" width="400" height="250"></canvas>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-onbox">
                        <h4>Gasto de Conbustible</h4>
                        <p>
                            <canvas id="combustible-chart" width="400" height="250"></canvas>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-onbox">
                        <h4>Solicitudes</h4>
                        <div>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">00001- Arbol ostaculizando calle Col. Luisa</a></li>
                                <li class="list-group-item"><a href="#">00002- Tragante tapado, mal olor entrada del mercado</a></li>
                                <li class="list-group-item"><a href="#">00003- Derrumbe impide paso de peatones</a></li>
                                <li class="list-group-item"><a href="#">00004- Col Santa Maria, sin agua por 2 semanas</a></li>
                                <li class="list-group-item"><a href="#">00005- Fumigación en Col. Apulca</a></li>
                                <li class="list-group-item"><a href="#">00006- Limpieza de Cunetas calle principal</a></li>
                            </ul>
                            <a href="#">Más</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-onbox">
                        <h4>Ordenes de Trabajo</h4>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-onbox">
                        <h4>Planificación Semana</h4>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-onbox">
                        <h4>Otras cosas</h4>
                        <p>
                            
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>


</body>

    <?php
//AppAsset::register($this);
  //  $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/favicon.png']);
   // $this->registerJsFile(Yii::$app->request->baseUrl.'/js/Chart.min.js',['depends' => [\yii\web\JqueryAsset::className()],'position'=>\yii\web\View::POS_END]);
    //$this->registerJsFile(Yii::$app->request->baseUrl.'/js/index.js',['depends' => [\yii\web\JqueryAsset::className()],'position'=>\yii\web\View::POS_END]);
    
    ?>

    <!--   Core JS Files   -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/bootstrap-notify.js"></script>

    

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWdEiucbG2ij5EFbtsWPCGIqhgLr_ETg"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/demo.js"></script>

    

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            /*$.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });*/

        });
    </script>

</html>

                
            

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
