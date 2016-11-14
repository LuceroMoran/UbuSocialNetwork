<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="awesomplete/awesomplete.css" media="screen" title="no title">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" href="Images/logo.png">
  <link rel="stylesheet" href="css/perfilpublico.css">
<title>Perfil Público</title>
</head>
<body ng-app="publicperfilapp" ng-controller="MainController">
  <header>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="true">
            <span class="sr-only">Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <span><img src="Images/logo.png" align="center" width="50" height="25"/></span></script></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-1">
             <form class="navbar-form navbar-left" role="search">
               <div class="form-group" >
                 <input type="text" class="form-control" id="ingenieur" placeholder="Buscar" >
               </div>
               <button ng-click="irPerfil()" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
             </form>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="feed"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/my_profile"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                <li><a href="my_profile#/user_config"><span class="glyphicon glyphicon-wrench"></span> Opciones</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/"><span class=" glyphicon glyphicon-off"></span> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  </header>

<div class="col-md-2" id="aside-1">
  <caption><h4>    </h4></caption>
</div>

  <div class="container col-md-7" id="aside-3">
  <div ng-controller="StartPublicController" id="menu">
    <div align="center"  ng-repeat="info in myinfo">
            <img  ng-src="{{info.profile_picture}}" alt="" class="img-responsive img-rounded post-picture" width="40%"/>
    </a>
    </div>
    <section clas="jumbotron1" ng-repeat="info in myinfo">
      <div class="container col-md-12" align="center">
        <h3 class="media-heading" id="nombre">{{info.name}}</h3>
       <button ng-if="!suscrito" name="follow" class="btn btn-info" ng-click="follow()">Seguir</button>
       <h5 ng-if="suscrito">Siguiendo</h5>
      </div>
    </section>

    <div class="container-fluid" id="main">
      <ul class="nav nav-tabs nav-justified">
        <li role="presentation" ui-sref="public_post"><a href="#posts">Publicaciones</a></li>
        <li role="presentation" ui-sref="public_codigo"><a href="#codigo">Códigos</a></li>
        <li role="presentation" ui-sref="followers"><a href="#seguidores">Seguidores</a></li>
      </ul>
    </div>
  </div>


     <div class="vistas-wrapper" ui-view="content"></div>
  </div>

  <div class="container col-md-2" id="aside-1">
  </div>


  <script src="js/angular/angular.min.js"></script>
  <script src="js/angular/angular-ui-router.min.js"></script>
  <script src="js/angular/modules/public_profile.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="awesomplete/awesomplete.min.js" charset="utf-8"></script>
</body>
</html>
