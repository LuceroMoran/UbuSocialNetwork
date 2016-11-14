
var GroupsApp = angular.module('GroupsApp', ['ui.router']);
GroupsApp.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/feed');

  $stateProvider.state('feed',{
    url: '/feed',
    views:{
      'content':{
        templateUrl: 'templates/feed.html',
        controller: 'StartFeedController'
      }
    }
  });
  $stateProvider.state('newGroup',{
    url: '/newGroup',
    views: {
      'content':{
        templateUrl: 'templates/groups.html',
        controller: 'StartGroupsController,'
      }
    }
  });
});

GroupsApp.controller('StartGroupsController', ['$scope', '$http', function($scope, $http){
  $scope.newGroupData = {groupName: '', privacy: ''};
  $scope.GroupData = {group_id: '', member_id = '', privilege = ''};

  $scope.create = function(groupName, privacy){
    $scope.newGroupData.groupName = groupName;
    $scope.newGroupData.privacy = privacy;
    $http.post('group/create', $scope.newGroupData)
    .success(function(data){
      console.log(data);
    })
    .error(function(err){
      console.log(500)
    })
  }

  angular.element(document).ready(function(){
    $http.post('group/info', {})
    .success(function(data){
      console.log(data)
      $scope.groupID = data.groupID;
    })
    .error(function(err){
      console.log(500);
    })
  })

  $scope.addMembers = function(group_id, memeber_id, privilege){
    $scope.GroupData.group_id = group_id;
    $scope.GroupData.memeber_id = memeber_id;
    $scope.GroupData.privilege = privilege;
    $http.post('group/new_member', $scope.GroupData)
    .success(function(data){
      console.log(data);
    })
    .error(function(err){
      console.log(500)
    })
  }



  $scope.addMembers = function(group_id, memeber_id, privilege){
    $scope.GroupData.group_id = group_id;
    $scope.GroupData.memeber_id = memeber_id;
    $scope.GroupData.privilege = privilege;

  }


}])
