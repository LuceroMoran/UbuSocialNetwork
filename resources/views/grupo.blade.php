<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/grupo.css">
     <link rel="stylesheet" href="sweetalert/sweetalert.css">
  <title>Document</title>
</head>

<body ng-app="grupoapp" ng-controller="MainController">
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
              <input type="text" class="form-control" placeholder="Buscar" ng-model="usuario.email">
            </div>
            <button ng-click="irPerfil()" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="feed"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="my_profile"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
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

<aside class="col-md-3 col-xs-12 col-sm-12">

  <!--Miembros-->
  <section class="jumbotron1">
    <img src="Images/html.jpg" alt="" class="img-responsive img-rounded cover"/>
  </section>
  <h3 align="center"> Miembros </h3>
  <div class="panel panel-default" ng-repeat="member in miembrosDelGrupo" >
    <ul class="list-group">
      <!--Primer miembro -->
        <li class="list-group-item">
          <a ng-href="/publicprofile={{member.email}}" >
          <img ng-src="{{member.profile_picture}}" class="img img-circle" alt="">
          <strong class="media-heading"> {{member.name}} </strong> <span>   </span>
        </a></li>
    </ul>
  </div>
  <p>
    Añadir miembro
  </p>
 <input type="text"  class="input" placeholder="correo del nuevo miembro" ng-model="anadir.usuario">
 <button  class="btn btn-success" ng-click="nuevo()">Añadir</button>

</aside>

<aside class="main container-fluid col-md-7 col-xs-12 col-sm-12">
<a href="grupo.html" align="center" ng-repeat="main in maindata">
  <h3>{{main.name}}</h3>
</a><header>
  <div class="container-fluid">
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation" ><a ui-sref="main">Posts</a></li>
      <li role="presentation"><a ui-sref="codigo">Publicar código</a></li>
      <li role="presentation"><a ui-sref="biblioteca">Biblioteca</a></li>
    </ul>
  </div>


  <div class="vistas-wrapper" ui-view="content">

  </div>
</aside>
<aside class="col-md-2 col-xs-12 col-sm-12 nota">
  <!--Notas-->
<textarea class="form-control" ng-model="mensaje.nota" rows="3" placeholder="Escribe una nota..."></textarea>
<div class="pull-right">  <br>
          <button type="submit" class="btn btn-large btn-warning " ng-click="sendnota()">Publicar</button>
        </div>
<div class="nota2"  >
  <div class="panel panel-default" ng-repeat="note in notas"><div class="panel-body"> <button type="button" class="close" ng-click="close(note.id)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>{{note.nota}}</div></div>
</div>
</aside>




    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/angular/angular.min.js"></script>
    <script src="js/angular/angular-ui-router.min.js"></script>
    <script src="js/angular/modules/grupoapp.js"></script>
    <script src="js/angular/modules/betagrupoapp.js"></script>
    <script src="sweetalert/sweetalert.min.js" ></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>
