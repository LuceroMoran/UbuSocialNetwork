console.log(user_id);
var own_profileapp = angular.module('own_profileapp',[]);

own_profileapp.controller('MOProfileCTRL', ['$scope','$http',function($scope,$http) {
  $scope.datatosent = {id : user_id};
    angular.element(document).ready(function () {
        $http.post('getusrdata',$scope.datatosent)
        .success(function(data){
          console.log("Ok");
          $scope.profiledata = data;
          // console.log($scope.profiledata);
        })
        .error(function(err){
          console.log(500);
        });

        $http.post('getmyPost',$scope.datatosent)
        .success(function(data){
          // console.log(data);
          $scope.mispost = data
        })
        .error(function(err){
          console.log(500);
        })
    });
}]);

own_profileapp.controller('SendNewsCTRL' , ['$scope','$http', function($scope,$http){
  $scope.newtosend ={post:'',userid:user_id}
  $scope.sendnew = function(){

    $http.post('sendaNew',$scope.newtosend)
    .success(function(data){
      console.log('ok');
      swal('¡Bien!')
      $scope.newtosend.post = ''
    })
    .error(function(err){
      console.log(500);
    })
  }
}]);
