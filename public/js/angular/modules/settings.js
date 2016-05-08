var settings = angular.module('settings',['ui.router']);
settings.config(function($stateProvider, $urlRouterProvider){
  $urlRouterProvider.otherwise('/general');

  $stateProvider
  .state('general',{
    url: '/general',
    views:{
      'content' :{
        templateUrl : 'templates/generalSettings.html',
         controller : 'GeneralSettingsController',
      }
    }
  })
  .state('profile',{
    url : '/profile',
    views:{
      'content' :{
        templateUrl :'templates/profileSettings.html',
        controller :'ProfileSettingsController',
      }
    }
  });
});
