angular.module("estagioApp").controller('globalController', ["$scope", '$location', 'config', 'userModel', function ($scope, $location, config,  userModel) {
    $scope.user = userModel.getUserObject();
    if($scope.user){
        $scope.userAcess = $scope.user.data.user.acesso_idacesso;
        config.personalConfig = $scope.user.data.conf;
    }

    $scope.templates = {};
    $scope.templates.navUrl = "view/common/navbar.html";
    $scope.templates.alnUrl = "view/common/navbarAluno.html";
    $scope.templates.supUrl = "view/common/navbarSup.html";
    $scope.templates.crdUrl = "view/common/navbarCoord.html";
    angular.extend($scope,{
        doLogout: function () {
            userModel.doUserLogout();
            $location.path('logout');
        }
    });
}]);