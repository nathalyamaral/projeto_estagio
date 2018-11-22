angular.module("estagioApp").controller('globalController', ["$scope", '$location', 'config', 'userModel', function ($scope, $location, config,  userModel) {
    $scope.user = userModel.getUserObject();
    if($scope.user){
    	config.personalConfig = $scope.user.data.conf;
    }
    $scope.templates = {};
    $scope.templates.navUrl = "view/common/navbar.html";
    $scope.templates.admUrl = "view/common/navbarAdmin.html";
    $scope.templates.alnUrl = "view/common/navbarAluno.html";
    $scope.templates.supUrl = "view/common/navbarSup.html";
    $scope.templates.crdUrl = "view/common/navbarCoord.html";
    angular.extend($scope,{
        doLogout: function () {
            userModel.doUserLogout();
            $scope.user = {};
            $scope.userAcess = 0;
            $location.path('logout');
        }
    });
}]);