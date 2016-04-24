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
  })
  .state('followers',{
  	url: '/followers',
  	views:{
  		'content':{
  			templateUrl : 'templates/public-followers.html',
  			controller : 'FollowersController',
  		}
  	}
  });
});

publicperfilapp.controller('StartPublicController',['$scope','$http',function($scope,$http){
  $scope.posttosend = {post : ''};
  $scope.addLike = {pid : ''};
	$scope.follow = function(){
		$http.post('publicprofile/follow',{})
		.success(function(data){
			window.location = ""
		})
		.error(function(err){
			console.log(500);
		})
	}

  $scope.send = function(){
    $http.post('publicprofile/post',$scope.posttosend)
    .success(function(data){
      console.log(data);
      $scope.posttosend.post = '';
    })
    .error(function(err){
      console.log(500)
    })
  }

  $scope.sendlike = function(id){
    $scope.addLike.pid = id;
    $http.post('publicprofile/like',$scope.addLike)
    .success(function(data){
      console.log(data);
    })
    .error(function(err){
      console.log(500)
    })
  }

// $scope.publicaciones = {name : '', text : '' , profile_picture : ''}
angular.element(document).ready(function () {
  $http.post('publicprofile/getposts',{})
  .success(function(data){
    console.log(data)
    $scope.publicaciones = data.postinfo;
  })
  .error(function(err){
    console.log(500);
  })

  $http.post('publicprofile/getposts',{})
  .success(function(data){
    console.log(data)
    $scope.post_id = data.posts_ids;
  })
  .error(function(err){
    console.log(500);
  })

  $http.post('publicprofile/getinfo',{})
  .success(function(data){

  $scope.myinfo = data
  })
  .error(function(err){
    console.log(500);
  })

  $http.post('publicprofile/follow_validate',{})
.success(function(data){
	console.log(data);
	if(data == 208){
		$scope.suscrito = true;
	}else{
		$scope.suscrito = false;
	}

})
.error(function(err){
	console.log(500);
})

});




}]);


publicperfilapp.controller('FollowersController',['$scope','$http',function($scope,$http){

	$scope.verperfil = function(email){
		window.location = "/publicprofile="+email;
	}
	angular.element(document).ready(function () {
		console.log(10101001)
		$http.post('publicprofile/getfollowers',{})
		.success(function(data){
			$scope.followersdata = data;
		})
		.error(function(data){
			console.log(data);
		})
	});
}]);
