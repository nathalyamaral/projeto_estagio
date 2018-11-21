angular.module("estagioApp").service("usersApi", function ($http, config) {
    this.getArray = function () {
        return $http.get(config.baseUrl + '/api/getArray');
    };
    this.getVagas = function () {
        return $http.get(config.baseUrl + '/api/getVagas');
    };
    this.getAlunos = function () {
        return $http.get(config.baseUrl + '/api/Aluno');
    };

    this.getAuth = function () {
        return $http.get(config.baseUrl +'/api/auth');
    }
    this.getSolicita= function(){
        return $http.get(config.baseUrl +'/api/solicitacao');
    }

});
//# sourceMappingURL=userApi.js.map
