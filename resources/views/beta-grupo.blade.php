<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/grupo.css">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
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

     <div class="jumbotron">
       <div class="container text-center">
         <h1>Equipo UBU</h1>
       </div>
     </div>
     <div class="container-fluid bg-3 text-center">
       <div class="container text-center">
   <div class="row">
     <div class="col-sm-3 well">
       <div class="well">
         <p>Notas</p>

       </div>
       <textarea class="form-control" ng-model="mensaje.nota" rows="3" placeholder="Escribe una nota..."></textarea>
       <div class="pull-right">
                 <button type="submit" class="btn btn-large btn-warning " ng-click="sendnota()">Publicar</button>
       </div>
       <div class="nota2"  >
         <div class="panel panel-default" ng-repeat="note in notas"><div class="panel-body"> <button type="button" class="close" ng-click="close(note.id)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>{{note.nota}}</div></div>
       </div>
     </div>
     <div class="col-sm-7">
       <div class="row">
         <div class="col-sm-4">
           <div class="thumbnail">
            <div class="caption">
              <h3>Título Código</h3>
              <p>...</p>
              <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
         </div>
         <div class="col-sm-4">
           <div class="thumbnail">
            <div class="caption">
              <h3>Título Código</h3>
              <p>...</p>
              <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
         </div>
         <div class="col-sm-4">
           <div class="thumbnail">
            <div class="caption">
              <h3>Título Código</h3>
              <p>...</p>
              <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
          </div>
         </div>
       </div>
     </div>
     <div class="col-sm-2 well">
       <div class="well">
         Menú
       </div>
       <div class="well">
         <ul class="nav nav-pills nav-stacked">
           <li><a href="#">Home</a></li>
           <li><a href="#">Opción 1</a></li>
           <li><a href="#">Opción 2</a></li>
           <li><a href="#">Opción 3</a></li>
         </ul>
       </div>
     </div>
   </div>
 </div>





    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/angular/angular.min.js"></script>
    <script src="js/angular/angular-ui-router.min.js"></script>
    <script src="js/angular/modules/grupoapp.js"></script>
    <script src="sweetalert/sweetalert.min.js" ></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
