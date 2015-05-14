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
      controller: "cUser as cU",
      templateUrl: "partials/login.html"
  };
});