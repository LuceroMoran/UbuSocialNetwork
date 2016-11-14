
var userperfilapp = angular.module('userperfilapp',['ui.router']);
userperfilapp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/myposts');

  $stateProvider
  .state('myposts',{
    url: '/myposts',
    views:{
      'content' :{
        templateUrl : 'templates/perfil.html',
        controller : 'PostComment',
      }
    }
  })

  .state('seeFollowers',{
    url: '/seeFollowers',
    views:{
      'content':{
        templateUrl:'templates/perfilseguidores.html',
        controller :'followersControler'
      }
    }
  })

  .state('postCode',{
    url: '/postCode',
    views:{
      'content' :{
        templateUrl : 'templates/perfilcodigo.html',
        controller : 'PostCodeController',
      }
    }
  })

  .state('user_config',{
    url: '/user_config',
    views:{
      'content' :{
        templateUrl : 'templates/configuracion.html',
        controller : 'configController',
      }
    }
  })
});

userperfilapp.controller('MyProfileMainCtrl',['$scope','$http',function($scope,$http){
  $scope.firstTosend = {id : user_id};
  $scope.search={email:''}
  angular.element(document).ready(function () {
    $http.post('getmyinfo',$scope.firstTosend)
    .success(function(data){
    console.log(data);
    console.log(200);
    $scope.myinfo = data
    })
    .error(function(err){
      console.log(500);
    })
 });

 $scope.searchSb = function(){
    $scope.url = "/publicprofile="+encodeURI($scope.search.email)
    window.location = $scope.url
 }

 $scope.gotoSettings = function(){
   window.location = "/settings";
 }


}]);

userperfilapp.controller('PostComment',['$scope','$http',function($scope,$http){
$scope.firstTosend = {id : user_id};
$scope.posttosend = {post:''}
  $scope.addLike = {pid : ''};

$scope.viewCode = function(id){
  window.location = "/codigo_id="+encodeURI(id)
}
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
angular.element(document).ready(function () {

$scope.getdo = function(){
  setInterval(function(){
    $http.post('getmypost',$scope.firstTosend)
  .success(function(data){
    // console.log(data);
    $scope.publicaciones = data
  })
  .error(function(err){
    console.log(500);
  })
  }, 1000)
}

$scope.getdo();



  $http.post('getmyinfo',$scope.firstTosend)
  .success(function(data){
  console.log(data);
  console.log(200);
  $scope.myinfo = data
  })
  .error(function(err){
    console.log(500);
  })

  $http.post('getMyPostCode',{})
  .success(function(data){
    $scope.postCode = data
    console.log(data);
  })
  .error(function(err){
    console.log("error");
  })
});
}]);

userperfilapp.controller('PostCodeController',['$scope','$http',function($scope,$http){
  
  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
  editor.getSession().setMode("ace/mode/c_cpp");

  $scope.cambiarSintaxis = function(sintaxis){
    console.log(sintaxis)
    editor.getSession().setMode("ace/mode/"+sintaxis);
  }

  
  $scope.firstTosend = {id : user_id};
  $scope.codeInfo = {titulo : '',codigo:'',sintaxis : 'c'}
  $http.post('getmyinfo',$scope.firstTosend)
  .success(function(data){
  console.log(data);
  console.log(200);
  $scope.myinfo = data
  })
  .error(function(err){
    console.log(500);
  })

  $scope.sendCode =function(){
    console.log(editor.getValue());
    $scope.codeInfo.codigo = editor.getValue();
    $http.post('postcode',$scope.codeInfo)
    .success(function(data){
      console.log(data);
      swal("Publicado con exito")
      $scope.codeInfo = {titulo:'',codigo:'',sintaxis:'c'};
    })
    .error(function(err){
      console.log("error");
    })
  }
}]);

userperfilapp.controller('followersControler',['$scope','$http',function($scope,$http){
  console.log("Adentro de followers");
  $scope.verperfil = function(email){
    window.location = "/publicprofile="+email;
  }
  angular.element(document).ready(function () {
    $http.post('getMyFollowers',{})
    .success(function(data){
      $scope.followersdata = data;
    })
    .error(function(data){
      console.log(data);
    })
  });
}])


userperfilapp.controller('configController',['$scope','$http',function($scope,$http){
  $scope.youtube = {url:''}
  $scope.facebook = {url:''}
  $scope.twitter = {url:''}
  $scope.lenguaje = {sintaxis:''}

  $scope.upYoutube = function(){
    $http.post('update/Youtube',$scope.youtube)
    .success(function(data){
      swal("Actualizado")
    })
    .error(function(err){
      console.log("err");
    })
  }
  $scope.upFacebook = function(){
    $http.post('update/Facebook',$scope.facebook)
    .success(function(data){
      swal("Actualizado")
    })
    .error(function(err){
      console.log("err");
    })
  }
  $scope.upTwitter = function(){
    $http.post('update/Twitter',$scope.twitter)
    .success(function(data){
      swal("Actualizado")
    })
    .error(function(err){
      console.log("err");
    })
  }
  $scope.upLenguaje = function(){
    alert($scope.lenguaje.sintaxis)
    $http.post('update/Lenguaje',$scope.lenguaje)
    .success(function(data){
      swal("Actualizado")
      alert(data)
    })
    .error(function(err){
      console.log("err");
    })
  }
}])
