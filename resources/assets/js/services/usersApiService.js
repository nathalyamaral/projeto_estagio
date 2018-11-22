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
        }).then(function (success) {
            console.log(success);
        }, function (error) {
            console.log(error);
        });
    };
    this.getSolicita = function(){
        return $http({
            method: 'GET',
            url: baseUrl +'api/solicitacao'
        }).then(function(success) {
            return success;
        }, function (error) {
            alert(error);
        });
    };

    this.getEstagioOr404 = function(user, $scope){
        return $http({
            url: config.baseUrl + '/api/Estagio/0/'+user.rga,
            method: 'GET'
        }).then(function (success) {
            $scope.estagio = success.data;
        }, function (error) {
            console.log(error);
        });
    };
    this.getInsCnpjs = function(){
        return $http({
            url: baseUrl + 'api/instituicao',
            method: 'GET'
        }).then(function (success) {
            return success;
        }, function (error) {
            console.log(error);
        });
    };
    this.getInsCnpj = function(cnpj){
        return $http({
                url: baseUrl + 'api/instituicao/'+cnpj,
                method: 'GET'
            }).then(function (success) {
                return success;
            }, function (error) {
                console.log(error);
            });
    };
    this.getCampusInst = function(instituicao){
        return $http({
            method: 'GET',
            url: baseUrl +'api/campus',
        }).then(function(success) {
            return success;
        }, function (error) {
            alert(error);
        });
    };
})