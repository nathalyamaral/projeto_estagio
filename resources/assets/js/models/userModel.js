angular.module('estagioApp')
.factory('userModel', ['$http', '$cookies', function ($http, $cookies) {
    var userModel = {};
    userModel.doLogin = function (userdata) {
           return $http({
                headers:{
                    'Content-Type': 'application/json'
                },
                url: 'http://localhost:8000/api/auth',
                method: 'POST',
                data:{
                    email: userdata.email,
                    senha: userdata.senha
                }
            }).then(function (succesResponse) {
                $cookies.put('auth', JSON.stringify(succesResponse));
            }, function (error) {
                console.log(error);
                alert(error.data);
            });
        };

    userModel.getAuthStatus = function () {
        var status = $cookies.get('auth');
        if(status)
            return true;
        return false;
    };

    userModel.getUserObject = function(){
      var userObj = angular.fromJson($cookies.get('auth'));
      return userObj;
    };

    userModel.doUserLogout = function () {
        $cookies.remove('auth');
    };

        return userModel;
}]);