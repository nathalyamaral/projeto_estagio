angular.module('estagioApp')
.factory('userModel', ['$http', '$cookies', function ($http, $cookies) {
    var userModel = {};
    userModel.doLogin = function (userdata) {
           return $http({
                headers:{
                    'Content-Type': 'application/json'
                },
                url: baseUrl + 'api/auth',
                method: 'POST',
                data:{
                    email: userdata.email,
                    senha: userdata.senha
                }
            }).then(function (succesResponse) {
                $cookies.put('auth', JSON.stringify(succesResponse));
            },function (data, status, headers) {
                console.log(data, status, headers);
                alert(data, status, headers);
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


angular.module('estagioApp')
.factory('solicitaModel', ['$http','usersApi', function ($http, usersApi) {
    var solicitaModel = {};
    solicitaModel.doSolicita = function (solicitaData) {
        console.log(solicitaData);
        return $http({
                headers:{
                    'Content-Type': 'application/json'
                },
                url:baseUrl +'api/solicitacao',
                method: 'POST',
                data: solicitaData
            }).then(function(response){
                console.log(response);
            }).then(function(data, status, headers) {
                console.log(data, status, headers);
            });
        };
    solicitaModel.doGetSolicita = function () {
        return usersApi.getSolicita();
    }
    solicitaModel.doDeleteSolicita = function (solicitaData) {
        console.log(solicitaData);
        return $http({
                headers:{
                    'Content-Type': 'application/json'
                },
                url:baseUrl +'api/solicitacao',
                method: 'DELETE',
                data: solicitaData
            }).then(function(response){
                console.log(response);
            }).then(function(data, status, headers) {
                console.log(data, status, headers);
            });
    }
    return solicitaModel;
}]);

angular.module('estagioApp')
.factory('CadCoorModel', ['$http', function ($http) {
    var CadCoorModel = {};
    CadCoorModel.doCadCoorModel = function (CadCoorData) {
        console.log(CadCoorData);
        return $http({
                headers:{
                    'Content-Type': 'application/json'
                },
                url: baseUrl +'api/coordenador',
                method: 'POST',
                data: CadCoorData
            }).then(function(response){
                console.log(response);
            }).then(function(data, status, headers) {
                console.log(data, status, headers);
            });
        };
    return solicitaModel;
}]);
//# sourceMappingURL=userM.js.map
