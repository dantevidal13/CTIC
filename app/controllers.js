(function(){

	'use strict';

	angular
	.module('erpC', ['ngRoute','ui.bootstrap'])
    .controller('navBarCtrl', ['$scope', '$location',  function ($scope, $location) {
      $scope.navbarCollapsed = true;
      $scope.tab = 0;

      $scope.setTab = function (tabId) {
          $scope.tab = tabId;
          switch(tabId){
            case 1: document.title = 'Home'; break;
            case 2: document.title = 'Cursos'; break;
            case 3: document.title = 'Eventos'; break;
            case 4: document.title = 'Videos'; break;
            case 5: document.title = 'Contacto'; break;
            case 6: document.title = 'About'; break;
          }
      };

      $scope.isSet = function (tabId) {
          return $scope.tab === tabId;
      };

      if( $location.path() == "/" ) $scope.setTab(1);
      if( $location.path().indexOf("/cursos")   > -1 ) $scope.setTab(2);
      if( $location.path().indexOf("/events")   > -1 ) $scope.setTab(3);
      if( $location.path().indexOf("/videos")   > -1 ) $scope.setTab(4);
      if( $location.path().indexOf("/contacto") > -1 ) $scope.setTab(5);
      if( $location.path().indexOf("/about")    > -1 ) $scope.setTab(6);

    }])
  	.controller('HomeCtrl', ['$scope', 	function ($scope) {
  		console.log('HomeCtrl');
  	}])
    .controller('EventsCtrl', ['$scope',   function ($scope) {
      console.log('EventsCtrl');
    }])
    
})();