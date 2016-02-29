var app = angular.module('SparkApp', ['ui.router', 'ngMaterial','ngMdIcons', 'ngMessages'])


app.config(function($stateProvider, $urlRouterProvider){
    $urlRouterProvider.otherwise('login')

    $stateProvider.state('login', {
        url: '/login',
        templateUrl: 'loginReal.php',
        controller: 'loginCtrl'
    })

    $stateProvider.state('registration', {
        url: '/registration',
        templateUrl: 'registration.php',
        controller: 'regCtrl'
    })
})

app.controller('loginCtrl', ["$scope","$state", function($scope,$state){

    $scope.toSignUp = function(){
        window.location.hash="/registration"
    }

}])
app.controller('regCtrl', ["$scope", function($scope){
    $scope.loginPage = function(){
        window.location.hash="/login"
    }
}])
