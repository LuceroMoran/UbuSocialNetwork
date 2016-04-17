var publicperfilapp = angular.module('publicperfilapp',['ui.router']);
publicperfilapp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/public_post');

  $stateProvider
  .state('public_post',{
    url: '/public_post',
    views:{
      'content' :{
        templateUrl : 'templates/public-perfil.html',
        controller: 'StartPublicController'
      }
    }
  });
});

publicperfilapp.controller('StartPublicController',['$scope','$http',function($scope,$http){
	$scope.follow = function(){
		$http.post('publicprofile/follow',{})
		.success(function(data){
			console.log(data);
		})
		.error(function(err){
			console.log(500);
		})
	}

angular.element(document).ready(function () {
  $http.post('publicprofile/getposts',{})
  .success(function(data){
    console.log(data);
    $scope.publicaciones = data
  })
  .error(function(err){
    console.log(500);
  })

  $http.post('publicprofile/getinfo',{})
  .success(function(data){
  console.log(data);
  console.log(200);
  $scope.myinfo = data
  })
  .error(function(err){
    console.log(500);
  })
});


$http.post('publicprofile/follow_validate',{})
.success(function(data){
	console.log(data);
	if(data == 208){
		$scope.suscrito = true;
	}else{
		$scope.suscrito = false;
	}
	console.log($scope.suscrito);
})
.error(function(err){
	console.log(500);
})

}]);


