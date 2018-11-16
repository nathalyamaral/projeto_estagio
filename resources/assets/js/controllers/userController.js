angular.module("estagioApp").controller('userController', ['$scope', '$http', 'usersApi', function ($scope, $http, lista){
//["msg"];
    lista.getArray().then(function (response) {
        $scope.api = response.data;
    });

$scope.msg = "Ola";
}]);
angular.module('estagioApp').controller('otherController', ['$scope', '$http', function ($scope, $http){
    $scope.msg = "Ola Muchacho";
}]);