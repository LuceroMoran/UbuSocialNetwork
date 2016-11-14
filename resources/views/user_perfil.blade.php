<?php
session_start();
$user_id = $_SESSION['uid'];
// echo $user_id;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estilosperfil.css">
  <link rel="shortcut icon" href="Images/logo.png">
  <link rel="stylesheet" href="sweetalert/sweetalert.css">
  <title>MiPerfil</title>
  <script type="text/javascript">
    var user_id = "<?php echo $user_id;?>"
  </script>
</head>
<body ng-app="userperfilapp">

    <div ng-controller="MyProfileMainCtrl" >
      <header> <!-- barra -->
        <nav class="navbar navbar-fixed-top navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="true">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><span><img src="Images/logo.png" align="center" width="50" height="25"/></span></script></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-1">
              <form class="navbar-form navbar-left" role="search"> <!-- buscar -->
                <div class="form-group" >
                  <input type="text" class="form-control" placeholder="Buscar" ng-model="search.email">
                </div>
                <button ng-click="searchSb()" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
              </form>
              <ul class="nav navbar-nav navbar-right"> <!-- apartados -->
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi Perfil</a></li>
				<li><a href="/feed"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
				<!-- <li><a href="#"><span class="glyphicon glyphicon-fire"></span> Tendencias</a></li> -->
				<!-- <li><a href="#"><span class="glyphicon glyphicon-globe"></span> Explorar</a></li> -->
				<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Opciones<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span>Perfil</a></li> -->
                    <li><a ui-sref="user_config"><span class="glyphicon glyphicon-wrench"></span> Configuración</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/"><span class=" glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
      </nav>
      </header> <!-- fin barra -->

      
      <aside class="col-md-3 col-xs-12 col-sm-12" id="aside-1"> <!-- columna 1 -->
            <section class="jumbotron1" ng-repeat="info in myinfo"> <!--foto-->
            <!-- {{info.fav-language}} -->
            <img ng-src="{{info.profile_cover}}" style="position: relative; left: 0px; top:0px; z-index:1;" alt="" class="img-responsive img-rounded cover"/>
            <div class="container-fluid">
              <!-- <div class="row"> -->
                <div align="center" ng-repeat="info in myinfo">
                  <img ng-src="{{info.profile_picture}}" alt="" class="img-responsive img-rounded sidebar-picture" width="60%" style="position: relative; left: 0px;top:-60px;z-index:2;"/>
                </div>
              <!-- </div> -->
            </div>
            <div class="container" ng-repeat="info in myinfo" style="position:relative;left:0px;top:-45px;z-index:3; width:220px;">
            <h2 class="user_name"><div align="center">{{info.name}}</div></h2>
            
            <!-- {{info.fav-language}} -->
            </div>
            </section> 

          <div class="container col-md-8 botones"  ng-repeat="info in myinfo">
            <div align="center">
              <!-- <caption><h3>Secciones</h3></caption> -->
            </div>
            <div class="row">
					<a ui-sref="myposts" class="btn btn-block btn-primary active" >
					<span class="glyphicon glyphicon-modal-window"></span> Publicaciones</a>
              <!-- <a  ng-href="{{info.Youtube}}" class="btn btn-block btn-danger active" target="_blank">
                <span class="glyphicon glyphicon-play"></span> Canal de Youtube
              </a> -->
            </div>
			<div class="row">
					<a ui-sref="seeFollowers" class="btn btn-block btn-primary active" >
					<span class="glyphicon glyphicon-eye-open"></span> Seguidores</a>
            <!-- <div class="row" ng-repeat="info in myinfo"> -->
              <!-- <a ng-href="{{info.Twitter}}" class="btn btn-block btn-info" target="_blank">
                <span><img src="Images/twitter-logo.png" alt="1" width="20" height="20"/></span> Twitter
              </a> -->
            </div>
			<!-- <div class="row">
					<a ui-sref="seeFollowing" class="btn btn-block btn-primary active" target="_self">
					<span class="glyphicon glyphicon-link"></span> Siguiendo</a>
            </div> -->
            <div class="row">
					<a ui-sref="postCode" class="btn btn-block btn-primary active" >
					<span class="glyphicon glyphicon-upload"></span> Publicar un código</a>
              <!-- <a  ng-href="{{info.Facebook}}"class="btn btn-block btn-primary" target="_blank">
                <span><img src="Images/face.jpg" alt="" width="20" height="20" /></span> Facebook
              </a> -->
            </div>
          </div>
        </aside>
    </div>

	
    <div class="main container-fluid col-md-6 col-xs-12 col-sm-12">
      		<!--	<div class="container-fluid">
				<ul class="nav nav-tabs nav-justified">
				<li role="presentation"><a href="#posts" id="pestanas">Posts</a></li>
				<li role="presentation"><a ui-sref="seeFollowers" id="pestanas">Seguidores</a></li>
				<li role="presentation"><a href="#"id="pestanas">Mensajes</a></li> 
				<li role="presentation"><a ui-sref="postCode" id="pestanas">Publicar código</a></li>
				</ul>
					<div> -->
      <br>
      <div class="vistas-wrapper" ui-view="content">
      </div>
    </div>
	
	<aside class="col-md-3 col-xs-12 col-sm-12" id="aside-3">
    </aside>
	
    <!-- <aside class="col-sm-2" id="aside-2">
		 </aside> -->
  <script src="js/angular/angular.min.js"></script>
  <script src="js/angular/angular-ui-router.min.js"></script>
  <script src="js/angular/modules/user_perfil.js"></script>
  <script src="sweetalert/sweetalert.min.js" ></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="ace/src-noconflict/ace.js" charset="utf-8"></script>
</body>
</html>
