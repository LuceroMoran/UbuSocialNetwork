

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
        templateUrl : 'templates/grupocodigo.html',
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

  .state('ajustes',{
    url: '/ajustes',
    views:{
      'content' :{
        templateUrl : 'templates/grupo-ajustes.html',
        controller : 'MainController',
      }
    }
  })
});


grupoapp.controller('MainController',['$scope','$http',function($scope,$http){




 $scope.mensaje = {nota:''}
 $scope.usuario = {email:''}
 $scope.busqueda = {titulo:''}
 $scope.irPerfil = function(){
   $scope.busqueda.titulo = $("#ingenieur").val();
   console.log($scope.busqueda);
  var index = $scope.awlist.indexOf($scope.busqueda.titulo)
  //console.log(index);
  $scope.usuario.email = $scope.awlist[index + 1]
  window.location = "publicprofile="+$scope.usuario.email
 }
 $scope.anadir = {usuario:''}
 $scope.nuevo = function(){
   $http.post('group/nuevoMiembro',$scope.anadir)
   .success(function(data){
     if(data == 404){
       swal("No existe ese usuario")
     }
     if(data == 0101){
       swal("El usuario ya es parte del grupo")
     }
     if(data == 200){
       swal("Usuario añadido correctamente")
     }
     if(data == 111){
       swal("No tienes permisos para agregar miembros")
     }
$scope.anadir = {usuario:''}
   })
   .error(function(err){
     console.log("err");
   })
 }

 $scope.redireccionar = function(email)
 {
   window.location = "/publicprofile="+email
 }

 $scope.eliminarMiembro = function(id)
 {
   $http.post('group/delete_member',{id:id})
   .success(function(data){
     if(data == 0){
       swal("A sido eliminado")
     }
     if(data == 1){
       swal("No tienes permisos para eliminar miembros")
     }
     if(data == 004){
       swal("No puedes eliminarte a ti mismo genio :p")
     }

   })
   .error(function(err){
     swal(500)
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
  $scope.mensaje = {nota:''}
})
 }

var input = document.getElementById("ingenieur");
var awesomplete = new Awesomplete(input)
$http.post('getAllUsers',{})
.success(function(data){
  awesomplete.list = data;
  $scope.awlist = data
  //console.log(data);
});


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

      $http.post('group/members',{})
      .success(function(data){
        // console.log(data);
        $scope.miembrosDelGrupo = data
      })
      .error(function(data){
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

}]);

grupoapp.controller('PostController',['$scope','$http',function($scope,$http){
   $( "#publicarArea" ).focus(function() {
  console.log("Hola")
  $( "#cover" ).addClass( "noselected" );
  $( "#notas" ).addClass( "noselected" );
  $( "#menu" ).addClass( "noselected" );
  $( "#publicaciones" ).addClass( "noselected" );
  $( "#publicarArea" ).addClass( "selected" );
  $("#publicarArea").blur(function(){
    $( "#cover" ).removeClass( "noselected" );
  $( "#notas" ).removeClass( "noselected" );
  $( "#menu" ).removeClass( "noselected" );
  $( "#publicaciones" ).removeClass( "noselected" );
  $( "#publicarArea" ).removeClass( "selected" );
  });
}); 
  $scope.publicacion = {mensaje:''}
  $scope.send = function(){
    $http.post('group/post',$scope.publicacion)
    .success(function(data){
      if (data == 404) {
        swal('Para publicar tienes que se miembro')
      }
      $scope.publicacion = {mensaje:''}
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

  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
  editor.getSession().setMode("ace/mode/c_cpp");

  $scope.cambiarSintaxis = function(sintaxis){
    console.log(sintaxis)
    editor.getSession().setMode("ace/mode/"+sintaxis);
  }


  $scope.codeInfo = {titulo : '',codigo:'',sintaxis : 'c'}
  $scope.sendCode =function(){
    console.log(editor.getValue());
    $scope.codeInfo.codigo = editor.getValue();

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
  $scope.traerCodigo = function(id)
  {
    $http.post('getCodeText',{id:id})
    .success(function(data){
      $scope.codigoTexto = data;
      console.log(data);
    })
  }
  $scope.verCodigo = function(id){
    window.location = "codigo_id="+id
  }
}])
