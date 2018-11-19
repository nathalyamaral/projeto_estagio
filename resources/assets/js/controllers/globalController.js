angular.module("estagioApp").controller('globalController', ["$scope", 'userModel', function ($scope, userModel) {
    $scope.templates = {};
    $scope.templates.navUrl = "view/common/navbar.html";
    $scope.templates.alnUrl = "view/common/navbarAluno.html";
    $scope.templates.supUrl = "view/common/navbarSup.html";
    $scope.templates.crdUrl = "view/common/navbarCoord.html";
}]);