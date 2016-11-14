<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ubu, Devs Social Network</title>
    <link rel="stylesheet" href="css/feedd.css">
    <link rel="shortcut icon" href="Images/logo.png">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/icon/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="awesomplete/awesomplete.css" media="screen" title="no title">
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/angular/angular.min.js"></script>
    <script src="js/angular/angular-ui-router.min.js"></script>
    <script src="js/angular/modules/feedapp.js"></script>
    <script src="sweetalert/sweetalert.min.js" ></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="awesomplete/awesomplete.min.js" charset="utf-8"></script>
    <script src="ace/src-noconflict/ace.js" charset="utf-8"></script>

  </head>

  <!--NavBar-->
  <body ng-app="feedapp" ng-controller="MainController" class="body" id="fonts">
    <header>
      <nav class="navbar navbar-fixed-top navbar-inverse">
          <div class="container-fluid" id="not">
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
                 <input type="text" class="form-control" id="ingenieur" placeholder="Buscar" >
               </div>
               <button ng-click="irPerfil()" class="btn btn-warning" id="btntr"><span class="glyphicon glyphicon-search"></span></button>
             </form>
             <ul class="nav navbar-nav navbar-right">
               <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li><a href="/my_profile"><span class="glyphicon glyphicon-user"></span>Mi Perfil</a></li>
                   <li><a href="my_profile#/user_config"><span class="glyphicon glyphicon-wrench"></span>Configuración</a></li>
                   <li role="separator" class="divider"></li>
                   <li><a href="/"><span class=" glyphicon glyphicon-off"></span>Log Out</a></li>
                 </ul>
               </li>
             </ul>
           </div>
         </div>
      </nav>
    </header>

    <!--Grupos-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 no-float">
          <h2 id="group">Grupos</h2><br>
          <h4>Crea tu Grupo
            <a href="#group-modal" class="Group-link" data-toggle="modal"><span class="glyphicon glyphicon-plus"></a></h4><br>
          <h4>Tus Grupos</h4>
          <div ng-repeat="grupos in misgrupos">
            <a href="/grupo={{grupos.id}}" class="code-link">{{grupos.name}}</a>
          </div>
        </div>

      <!--Post-->
      <div class="col-md-6 no-float">
          <div id="cheat">&nbsp;</div>
          <div class="media">
            <div class="media1" ng-repeat="info in myinfo">
              <div class="media-left">
                <a href="/my_profile">
                  <img class="media-object img-rounded post-picture" ng-src="{{info.profile_picture}}" alt="" >
                </a>
              </div>
              <div class="media-body">
                <a href="/my_profile"><h3 class="media-heading" id="nombre">{{info.name}}</h3></a>
                <textarea class="form-control" ng-model="posttosend.post" name="post" rows="2" cols="53" placeholder="¿Pero qué estás tramando {{info.name}}?"></textarea>
                <button ng-click="send()" class="btn btn-large btn-danger" id="btntr2" name="button">Publicar</button>
              </div>
            </div>
          </div>
          <!--News-->
          <div class="media" ng-repeat="new in news" id="nw">
                <div class="media-left">
                  <a ng-href="/publicprofile={{new.memail}}">
                    <img ng-src="{{new.profile_picture}}" class="img-rounded post-picture" alt="">
                  </a>
                </div>
                <div class="media-body" >
                  <a ng-href="/publicprofile={{new.email}}"><h4 class="media-heading name-post"> {{new.name}}</a> <a ng-href="/publicprofile={{new.memail}}"><span ng-if="new.name != new.mname">: {{new.mname}}</h4></a>
                  <p class="post-news">
                    {{new.text}}
                  </p>
                  <img src="Images/smile.svg" alt="Dale like" class="like" ng-model="addLike.pid" ng-click="sendlike(new.id)">
                  {{new.likes}}
                </div>
          </div>
        </div>

        <!--Code-->
        <div class="col-md-3 no-float">
          <h2>Código</h2><br>
          <h4>Comparte Código
            <a href="#sin-modal" class="Group-link" data-toggle="modal"><span class="glyphicon glyphicon-plus"></a></h4>
              <br>
          <h4>Códigos Recientes</h4>
            <div class="seccion" ng-repeat="code in codigos">
              <table>
            <tr>
              <td>
                <a href="/publicprofile={{code.email}}"><img ng-src="{{code.profile_picture}}" class="img-rounded postmini-picture" alt=""></a>
              </td>
              <td>
                <a ng-href="/publicprofile={{code.email}}" class="code-link">{{code.name}}</a>
                Publicó:
                <a ng-click="viewCode(code.id)" class="code-link">"{{code.titulo}}"</a>
                 en {{code.sintaxis}}
              </td>
            </tr><br>
          </div>
          </table>
          </div>

          <!--NewGroup-->
          <div class="modal fade" id="group-modal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <font color= "black"><h4 class="modal-title">Nuevo Grupo</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                 <label for="name">Nombre del Grupo</label>
                 <input type="text" class="form-control" ng-model="grupo.nombre" placeholder="Escribe el nombre del grupo">
                 </div>
                 <div class="form-group">
                  <label for="asunto">Asunto del Grupo</label>
                  <input type="text" class="form-control" ng-model="grupo.asunto" placeholder="Escribe el asunto del grupo">
                 </div>
              </div>
            </font>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button ng-click="crearGrupo()" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
              </div>
            </div>
          </div>
        </div>

        <!--PostCode-->
        <div class="modal fade" id="sin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <font color= "black"><h4 class="modal-title">Comparte Códico</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
               <label for="name">Título</label>
               <input type="text" class="form-control" ng-model="cod.titulo" placeholder="Escribe el título del código">
              </div>
               <div class="form-group">
                  <label> Seleccionar Sintaxis</label>
                    <select class="form-control" cols="50" id="sel1" ng-model="cod.sintaxis" ng-change="cambiarSintaxis(cod.sintaxis)">
                      <option value="html">HTML</option>
                      <option value="php">PHP</option>
                      <option value="css">CSS</option>
                      <option value="c_cpp">C++</option>
                      <option value="javascript">JavaScript</option>
                  </select>
            </div>

          <div class="form-group">
            <div id="editor" class=" form-control ">
            </div>
          </div>
          </font>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button ng-click="pubCode()" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>





  <!-- <script src="js/materialize.min.js"></script> -->
  </body>
</html>
