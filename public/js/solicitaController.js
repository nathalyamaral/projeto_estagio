angular.module("estagioApp").controller('solicitaController',  ['$scope','$http', 'solicitaModel', '$location','usersApi', function ($scope, $http, solicitaModel, $location, usersApi){
    $scope.doAction = function (razao) {
        if (razao == "Cadastro coordenador") {
            document.getElementById("btnInst").style.display = "contents";
            document.getElementById("cod").style.display = "contents";
            document.getElementById("duv").style.display = "none";
            document.getElementById("Inst").style.display = "contents";
        }
        if (razao == "Duvida") {
            document.getElementById("duv").style.display = "contents";
            document.getElementById("cod").style.display = "none";
            document.getElementById("instituicaoCad").style.display = "none";
            document.getElementById("btnInst").style.display = "none";
        }
    };
    angular.extend($scope,{
        doSolicita: function (solicitaForm){
            if ($scope.solicitacao.razao == "Duvida") {
                var solicitaData = {
                    razao: $scope.solicitacao.razao,
                    informacao: 'nome: ' + $scope.solicitacao.nome + ' email: '+ $scope.solicitacao.email + ' informacao: '+ $scope.solicitacao.informacao
                };
                solicitaModel.doSolicita(solicitaData).then(function (succesresponse) {
                    $location.path('dashboard');
                }).then(function (error) {
                    console.log(error);
                });
            }else{

            }
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
    angular.extend($scope,{
        doCadastroInstituicao: function () {
            document.getElementById("Inst").style.display = "none";
            document.getElementById("instituicaoCad").style.display = "contents";
        }
    });
    angular.extend($scope,{
        DoInsExist: function () {
            var cnpj= $scope.solicitacao.instituicao.CNPJ;
            usersApi.getInsCnpj(cnpj).then(function(sucess){
                $scope.solicitacao.instituicao = sucess.data[0];
                var cnpj= $scope.solicitacao.instituicao.CNPJ;
                console.log(cnpj);
                usersApi.getCampusInst(cnpj).then(function(sucess){
                    console.log(sucess);
                    // $scope.solicitacao.campus = sucess.data[0];
                });
            });
        }
    });
}]);
//# sourceMappingURL=solicitaController.js.map
