angular.module("estagioApp").service("usersApi", function ($http, config) {
    this.getArray = function () {
        return $http.get(config.baseUrl + '/getArray');
    };
});
//# sourceMappingURL=userApi.js.map
