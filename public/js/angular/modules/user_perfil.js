

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
