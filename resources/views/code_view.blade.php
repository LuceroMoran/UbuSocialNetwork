

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="shortcut icon" href="Images/logo.png">
   <link rel="stylesheet" href="css/code_view.css">
</head>
<body ng-app="codeapp" ng-controller="firstController">
  <textarea id="recibeCodigo">{{data.codigo}}</textarea>
  <div class="main container-fluid col-md-8 col-xs-12 col-sm-12">

    <div class="media">
      <div class="media-body">
        <h4 class="media-heading" ng-repeat="data in codigodata"><a href="#">{{data.titulo}}</h4></a>
      <a href="#paginalenguaje" ng-repeat="data in codigodata">{{data.sintaxis}} <span class="glyphicon glyphicon-tags"></span></a>
      <div class="row">
      <pre id="code-layer">
        
      </pre>
      </div>
      <button type="submit" class="btn btn-large btn-primary" name="like">Like</button>

      <div class="media" id="media-com">
        <div class="media-left">
          <a href="perfil.html" ng-repeat="info in personalInfo">
            <img ng-src="{{info.profile_picture}}" class="img-rounded post-picture" alt="">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading" ng-repeat="info in personalInfo"><a href="#">{{info.name}}</h4></a>
          <div class="col-md-8">
            <div class="row">
            <div class="input-group" ng-repeat="info in personalInfo" >
              <input type="text" class="form-control" placeholder="Comenta algo {{info.name}}">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">Comentar</button>
              </span>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="media" id="media-com">
        <div class="media-left">
          <a href="perfil.html">
            <!-- <img src="img/ed3.jpg" class="img-rounded" alt=""> -->
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading" ><a href="#">Comentario</h4></a>
          <p>
          Damn!!!!! Bruhhh
        </p>
        </div>
      </div>
    </div>
  </div>
  </div>


  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular/angular.min.js"></script>
  <script src="js/angular/angular-ui-router.min.js"></script>
  <script src="js/angular/modules/code_view.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
<!-- <script src="js/code_layer.js" charset="utf-8"></script> -->
</body>
</html>
