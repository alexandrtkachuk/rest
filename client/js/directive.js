App.directive('shopHeader', function() {
  return {
      restrict: 'AE',
      replace: 'true',
      templateUrl: "partials/header.html"
  };
});

App.directive('loginForm', function() {
  return {
      restrict: 'AE',
      replace: 'true',
      templateUrl: "partials/login.html"
  };
});