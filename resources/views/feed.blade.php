<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ubu, Devs Social Network</title>
    <link rel="stylesheet" href="css/feedstyles.css">
    <link rel="stylesheet" href="css/frappe.css">
    <link rel="shortcut icon" href="Images/logo.png">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/icon/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:600' rel='stylesheet' type='text/css'>
  </head>


    <body ng-app="feedapp" ng-controller="MainController" class="body">

    <header>
    	<!-- Navegación -->
      <nav class="navbar navbar-fixed-top navbar-inverse">
          <div class="container-fluid">
          <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="true">
          <span class="sr-only">Navigation</span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <span><img src="Images/logo.png" align="center" width="52" height="32"/></span></script></a>
          </div>

            <div class="collapse navbar-collapse" id="navbar-1">
            <form class="navbar-form navbar-left" role="search">
            <div class="form-group" >
            <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
    		</form>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="home"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="perfil.html"><span class="glyphicon glyphicon-user"></span>Mi Perfil</a></li>
        <li><a href="configuracion.html"><span class="glyphicon glyphicon-wrench"></span>Configuración</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#"><span class=" glyphicon glyphicon-off"></span>Log Out</a></li>
        </ul>
        </li>
        </ul>
        </div>
        </div>
        </div>
        </nav>
    </header>

    <div class="row">

        <div class="main container-fluid col-md-12 col-xs-12 col-sm-12">




    	    <!-- post -->
    		<div class="col-sm-8">
          	<div class="media">


            <div class="media1" ng-repeat="info in myinfo">
            <div class="media-left">
            <a href="#">
            <img class="media-object img-rounded post-picture" ng-src="{{info.profile_picture}}" alt="" >
            </a>
            </div>
            <div class="media-body">
            <h4 class="media-heading">{{info.name}}</h4><br>
            <textarea ng-model="posttosend.post"name="post" rows="2" cols="53" placeholder="¿Pero qué estás tramando {{info.name}}?"></textarea>
            <br><br>
            <button ng-click="send()" class="btn btn-large btn-danger" name="button">Publicar</button>
            </div>
            </div>



    				<br>

    		  <!-- cuadros de texto -->
          <div class="media" ng-repeat="new in news">
                <div class="media-left">
                  <a href="perfil.html">
                    <img ng-src="{{new.profile_picture}}" class="img-rounded post-picture" alt="">
                  </a>
                </div>
                <div class="media-body" >
                  <h4 class="media-heading name-post"> {{new.name}}  <span ng-if="new.name != new.mname"> : {{new.mname}}</h4>
                  <p class="post-news">
                    {{new.text}}
                  </p>
                  <img src="Images/smile.svg" alt="Dale like" class="like" ng-model="addLike.pid" ng-click="sendlike(new.id)">
                  {{new.likes}}
                </div>
          </div>
    		  <br>
        </div>

    	</div>



    	<!-- barra lateral -->
    	<div class="col-sm-4">
    	<div id="barra">
        <div class="titulobarrita">
        -Códigos Recientes-
        </div>

        <div class="seccion" ng-repeat="code in codigos">
        <ul>
          <li><a href="#"><img ng-src="{{code.profile_picture}}" class="img-rounded post-picture" alt=""></a><br>
  	      <a ng-click="viewCode(code.id)">{{code.name}} publicó "{{code.titulo}}" en {{code.sintaxis}}</a>
          </li>
        </div>
        </div>
    	</div>






    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/angular/angular.min.js"></script>
    <script src="js/angular/angular-ui-router.min.js"></script>
    <script src="js/angular/modules/feedapp.js"></script>
    <script src="sweetalert/sweetalert.min.js" ></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <!-- <script src="js/materialize.min.js"></script> -->
  </body>
</html>
