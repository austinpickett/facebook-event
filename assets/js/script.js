angular.module('MyApp', ['facebook'])

  .config([
    'FacebookProvider',
    function(FacebookProvider) {
     var myAppId = '617281425033793';
     
     // You can set appId with setApp method
     // FacebookProvider.setAppId('myAppId');
     
     /**
      * After setting appId you need to initialize the module.
      * You can pass the appId on the init method as a shortcut too.
      */
     FacebookProvider.init(myAppId);
     
    }
  ])
  
  .controller('MainCtrl', [
    '$scope',
    '$timeout',
    'Facebook',
    function($scope, $timeout, Facebook) {
            
      var searchItem;
      var paging = '';
      $scope.events = {};

      $scope.changeAlert = function() {
        searchItem = $scope.search;
        $scope.eve();
      };

      $scope.beforeLink = function(b) {
        paging = "&before="+b;
        $scope.eve(paging);
      };
      $scope.afterLink = function(a) {
        paging = "&after="+a;
        $scope.eve(paging);
      };
      
      $scope.eve = function() {
        Facebook.api('/'+searchItem+'/events?access_token=639041606186502|uaa4AIPe63MOQQWKFlrTW2cZlHY&since=today&limit=10'+paging, function(response) {
          /**
           * Using $scope.$apply since this happens outside angular framework.
           */
          $scope.$apply(function() {
            $scope.events = response;
            console.log(response);
          });
          
        });
      };

      $scope.eve();
    }
  ])
  
  /**
   * Just for debugging purposes.
   * Shows objects in a pretty way
   */
  .directive('debug', function() {
    return {
      restrict: 'E',
      scope: {
        expression: '=val'
      },
      template: '<pre>{{debug(expression)}}</pre>',
      link: function(scope) {
        // pretty-prints
        scope.debug = function(exp) {
          return angular.toJson(exp, true);
        };
      }
    }
  });