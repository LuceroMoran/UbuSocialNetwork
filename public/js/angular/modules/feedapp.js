var feedapp = angular.module('feedapp',[]);

feedapp.controller('MainController',['$scope','$http',function($scope,$http){
  $http.post('group/myGroups',{})
  .success(function(data){
    console.log(data);
    $scope.misgrupos = data;
  })
  .error(function(err){
    console.log("error");
  })
  $http.post('feed/getPost',{})
  .success(function(data){
    // console.log(data);
    $scope.news = data
  })
  .error(function(data){
    console.log("error");
  })

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
