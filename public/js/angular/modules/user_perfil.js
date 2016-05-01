
console.log(user_id);
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
  });
});

userperfilapp.controller('MyProfileMainCtrl',['$scope','$http',function($scope,$http){
  $scope.firstTosend = {id : user_id};
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
}]);

userperfilapp.controller('PostComment',['$scope','$http',function($scope,$http){
$scope.firstTosend = {id : user_id};
$scope.posttosend = {post:''}
  $scope.addLike = {pid : ''};
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
});
}]);
