

var grupoapp = angular.module('grupoapp',['ui.router']);
grupoapp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/main');

  $stateProvider
  .state('main',{
    url: '/main',
    views:{
      'content' :{
        templateUrl : 'templates/grupomain.html',
        controller : 'PostController',
      }
    }
  })
  .state('codigo',{
    url: '/codigo',
    views:{
      'content' :{
        templateUrl : 'templates/perfilcodigo.html',
        controller : 'CodeController',
      }
    }
  })

  .state('biblioteca',{
    url: '/biblioteca',
    views:{
      'content' :{
        templateUrl : 'templates/grupo-codigos.html',
        controller : 'BiblioController',
      }
    }
  })
});


grupoapp.controller('MainController',['$scope','$http',function($scope,$http){
 $scope.mensaje = {nota:''}
 $scope.usuario = {email:''}
 $scope.irPerfil = function(){
   window.location = "publicprofile="+$scope.usuario.email
 }
 $scope.anadir = {usuario:''}
 $scope.nuevo = function(){
   $http.post('group/nuevoMiembro',$scope.anadir)
   .success(function(data){
     if(data == 404){
       swal("No existe ese usuario")
     }
     else{
       swal("Añadido")
     }
   })
   .error(function(err){
     console.log("err");
   })
 }
 $scope.close = function(id){
   $scope.cerrar ={nota_id:id}
   $http.post('group/eliminarNota',$scope.cerrar)
   .success(function(data){
     console.log("eliminado");
   })
   .error(function(err){
     console.log("err");
   })
 }
 $scope.sendnota = function(){
$http.post('group/nuevaNota',$scope.mensaje)
.success(function(data){
  if (data == 404) {
    swal("No puedes agregar notas sin pertenecer al grupo")
  }
})
 }

  $scope.intervalo = function(){
    setInterval(function () {
      $http.post('group/getNotas',{})
      .success(function(data){
        $scope.notas = data
        // console.log($scope.notas);
      })
      .error(function(err){
        console.log("err");
      })
    }, 800);
  }
$scope.intervalo();

  $http.post('group/info',{})
  .success(function(data){
    // console.log(data);
    $scope.maindata=data
  })
  .error(function(err){
    console.log("err");
  })
  $http.post('group/members',{})
  .success(function(data){
    // console.log(data);
    $scope.miembrosDelGrupo = data
  })
  .error(function(data){
    console.log("err");
  })
}]);

grupoapp.controller('PostController',['$scope','$http',function($scope,$http){
  $scope.publicacion = {mensaje:''}
  $scope.send = function(){
    $http.post('group/post',$scope.publicacion)
    .success(function(data){
      if (data == 404) {
        swal('Para publicar tienes que se miembro')
      }
    })
    .error(function(err){
      console.log("err");
    })
  }

  $scope.intervalWrapper = function(){
    setInterval(function () {

      $http.post('group/posts',{})
      .success(function(data){
        $scope.publicaciones = data
        // console.log(data);
      })
      .error(function(err){
        console.log("err");
      })
    }, 800);
  }

  $scope.intervalWrapper();
}])


grupoapp.controller('CodeController',['$scope','$http',function($scope,$http){
  // console.log("Estoy dentro");
  $scope.codeInfo = {titulo : '',codigo:'',sintaxis : 'c'}
  $scope.sendCode =function(){
   $http.post('group/postCode',$scope.codeInfo)
   .success(function(data){
     if (data == 200) {
       swal("Publicado con éxito")
     }
     if (data == 404){
       swal("No deberias estar aquí :P")
     }
   })
   }
}]);

grupoapp.controller('BiblioController',['$scope','$http',function($scope,$http){
  $http.post('group/getCodes',{})
  .success(function(data){
    $scope.codigos = data
  })
  .error(function(err){
    console.log("err");
  })

  $scope.verCodigo = function(id){
    window.location = "codigo_id="+id
  }
}])
