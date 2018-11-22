angular.module("estagioApp").controller('solicitaController',  ['$scope','$http', '$location','solicitaModel', function ($scope, $http, $location, solicitaModel){
    angular.extend($scope,{
        doSolicita: function (solicitaForm){
            var solicitaData = {
                razao: $scope.solicitacao.razao,
                informacao: 'nome: ' + $scope.solicitacao.nome + ' email: '+ $scope.solicitacao.email + ' informacao: '+ $scope.solicitacao.informacao
            };
            solicitaModel.doSolicita(solicitaData).then(function (succesresponse) {
                $location.path('dashboard');
            }).then(function (error) {
                console.log(error);
            });
            /*console.log(solicitaData);
            $http({
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
            });*/
       }
    });
}]);
//# sourceMappingURL=solicitaController.js.map
