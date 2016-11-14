var publicperfilapp = angular.module('publicperfilapp',['ui.router']);
publicperfilapp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/public_post');

  $stateProvider
  .state('public_post',{
    url: '/public_post',
    views:{
      'content' :{
        templateUrl : 'templates/public-perfil.html',
        controller: 'StartPublicController',
      }
    }
  })
  .state('public_codigo',{
    url: '/public_codigo',
    views:{
      'content' :{
        templateUrl : 'templates/public-codigo.html',
        controller: 'CodigoController',
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
  })
});

publicperfilapp.controller('MainController',['$scope','$http',function($scope,$http){

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

}])
publicperfilapp.controller('StartPublicController',['$scope','$http',function($scope,$http){
  $scope.posttosend = {post : ''};
  $scope.addLike = {pid : ''};


  $scope.viewCode = function(id){
    window.location = "/codigo_id="+encodeURI(id)
  }


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
      // console.log(data);
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
      // console.log(data);
    })
    .error(function(err){
      console.log(500)
    })
  }

// $scope.publicaciones = {name : '', text : '' , profile_picture : ''}
angular.element(document).ready(function () {

  $scope.intervalo = function(){
    setInterval(function () {
      $http.post('publicprofile/getposts',{})
      .success(function(data){
        // console.log(data)
        $scope.publicaciones = data.postinfo;
      })
      .error(function(err){
        console.log(500);
      })

      $http.post('publicprofile/getposts',{})
      .success(function(data){
        // console.log("Post info");
        // console.log(data)
        $scope.post_id = data.posts_ids;
      })
      .error(function(err){
        console.log(500);
      })
    }, 800);
  }

$scope.intervalo();
  $http.post('publicprofile/getinfo',{})
  .success(function(data){

  $scope.myinfo = data
  })
  .error(function(err){
    console.log(500);
  })

  $http.post('publicprofile/follow_validate',{})
.success(function(data){
	// console.log(data);
	if(data == 208){
		$scope.suscrito = true;
	}else{
		$scope.suscrito = false;
	}

})
.error(function(err){
	console.log(500);
})

$http.post('public/getCodes',{})
.success(function(data){
  $scope.postCode = data
  console.log(data);
})
.error(function(err){
  console.log("error");
})

});

$( "#publicarArea" ).focus(function() {
console.log("Hola")
$( "#menu" ).addClass( "noselected" );
$( "#publicaciones" ).addClass( "noselected" );
$( "#publicarArea" ).addClass( "selected" );
$("#publicarArea").blur(function(){
$( "#menu" ).removeClass( "noselected" );
$( "#publicaciones" ).removeClass( "noselected" );
$( "#publicarArea" ).removeClass( "selected" );
});
});


}]);


publicperfilapp.controller('FollowersController',['$scope','$http',function($scope,$http){

	$scope.verperfil = function(email){
		window.location = "/publicprofile="+email;
	}
	angular.element(document).ready(function () {
		$http.post('publicprofile/getfollowers',{})
		.success(function(data){
			$scope.followersdata = data;
		})
		.error(function(data){
			console.log(data);
		})
	});
}]);

publicperfilapp.controller('CodigoController',['$scope','$http',function($scope,$http){
  $scope.viewCode = function(id){
    window.location = "/codigo_id="+encodeURI(id)
  }
// $scope.publicaciones = {name : '', text : '' , profile_picture : ''}
angular.element(document).ready(function () {
$http.post('public/getCodes',{})
.success(function(data){
  $scope.postCode = data
  console.log(data);
})
.error(function(err){
  console.log("error");
})

});
  }]);
