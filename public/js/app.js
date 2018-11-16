/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 /

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 /

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 /

const app = new Vue({
    el: '#app'
});
*/

var app = angular.module("estagioApp",['ngRoute', 'ngCookies']);
app.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider){
        $routeProvider.when('/',{
            templateUrl: 'templates/users/login.html',
            controller: 'userController'
        });

        $routeProvider.when('/dashboard',{
            templateUrl: 'templates/users/dashboard.html',
            controller: 'userController'
        });

        $routeProvider.when('/logout',{
            templateUrl: 'templates/users/logout.html',
            controller: 'userController'
        });

        $routeProvider.otherwise('/');
    }]);
//# sourceMappingURL=app.js.map
