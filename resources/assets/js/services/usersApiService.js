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
    };

    this.insertNewVaga = function (idVaga, user) {
        return $http({
            url: config.baseUrl + '/api/regSolicitacao',
            method: 'POST',
            data: {'info': "vaga|"+idVaga+"|"+user}
        }).then(function (success, btn) {
            console.log(success);
        }, function (error) {
            console.log(error);
        });
    };

    this.getEstagioOr404 = function(user, $scope){
        return $http({
            url: config.baseUrl + '/api/Estagio/0/'+user.rga,
            method: 'GET'
        });
    };
    this.getSolicita = function(){
        return $http.get(config.baseUrl +'/api/solicitacao');
    }

});