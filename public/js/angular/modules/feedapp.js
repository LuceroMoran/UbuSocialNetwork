var feedapp = angular.module('feedapp',[]);

feedapp.controller('MainController',['$scope','$http',function($scope,$http){
  $scope.search = {email:''}
  $scope.searchSb = function(){
    window.location = "publicprofile="+$scope.search.email
  }
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

var input = document.getElementById("ingenieur");
var awesomplete = new Awesomplete(input)
$http.post('getAllUsers',{})
.success(function(data){
  awesomplete.list = data;
  $scope.awlist = data
  //console.log(data);
});

  $http.post('group/myGroups',{})
  .success(function(data){
    console.log(data);
    $scope.misgrupos = data;
  })
  .error(function(err){
    console.log("error");
  })
  $scope.intervalo = function(){
    setInterval(function () {
      $http.post('feed/getPost',{})
      .success(function(data){
        // console.log(data);
        $scope.news = data
      })
      .error(function(data){
        console.log("error");
      })
    }, 800);
  }

$scope.intervalo();
  $http.post('feed/info',{})
  .success(function(data){
    $scope.myinfo = data
  })
  .error(function(err){
    console.log("err");
  })

  $http.post('feed/codes',{})
  .success(function(data){
    $scope.codigos = data;
  })
  .error(function(err){
    console.log("err");
  })

  $scope.addLike = {pid : ''};
  $scope.sendlike = function(id){
    $scope.addLike.pid = id;
    $http.post('publicprofile/like',$scope.addLike)
    .success(function(data){
      // console.log(data);
    })
    .error(function(err){
      console.log(500)
    })

    console.log($scope.addLike);
  }

  $scope.posttosend = {post:''}
  $scope.send = function(){
    // console.log($scope.posttosend);
    $http.post('sendapost',$scope.posttosend)
    .success(function(data){
      console.log("ok");
      // console.log(data);
      $scope.posttosend.post = ''
    })
    .error(function(err){
      console.log(500);
    })
  };

  $scope.viewCode = function(id){
    window.location = "/codigo_id="+encodeURI(id)
  }

    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/c_cpp");

    $scope.cambiarSintaxis = function(sintaxis){
      console.log(sintaxis)
      editor.getSession().setMode("ace/mode/"+sintaxis);
    }


    $scope.cod = {titulo : '',codigo:'',sintaxis : ''}
    $scope.pubCode =function(){
      console.log(editor.getValue());
      $scope.cod.codigo = editor.getValue();

     $http.post('feed/postCode',$scope.cod)
     .success(function(data){
       if (data == 200) {
         swal("Publicado con éxito")
       }
       if (data == 404){
         swal("No deberias estar aquí :P")
       }
     })

     }

    $( "textarea[name=post]" ).focus(function() {
    $( "#nw" ).addClass( "noselected" );
    $( "textarea[name=post]" ).addClass( "selected" );
    $("textarea[name=post]").blur(function(){
    $( "#nw" ).removeClass( "noselected" );
    $( "textarea[name=post]" ).removeClass( "selected" );
    });
  });

  $scope.grupo = {nombre:'',asunto:''}
  $scope.crearGrupo = function(){
    $http.post('group/create',$scope.grupo)
    .success(function(data){
      swal("Creado correctamente")
    })
    .error(function(err){
      swal("Error")
    })
  }
}])
