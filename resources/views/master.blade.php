<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="estagioApp">
    <head>
        <meta charset="utf-8">
        <title>Plataforma Estagio</title>
        <link rel="stylesheet" type="text/css" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

        <!-- Tag for responsive design -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Authors and description -->
        <meta name="author" content="ProgWebers">
        <meta name="description" content="Trabalho Final de Prog">

        <!-- Custom fonts from this template -->
        <link rel="stylesheet" type="text/css" href="{{asset('bower_components/components-font-awesome/css/fontawesome-all.css')}}">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">


    </head>
    <body>

    <div class="container-fluid" ng-controller="globalController">
        <div ng-view></div>
    </div>

    <div class="container" id="footer" ng-include="'view/common/footer.html'"></div>
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular/angular.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-route/angular-route.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-cookies/angular-cookies.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/controller.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vagascontroller.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/configValues.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/userApi.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/routes.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/blog.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/models/userM.js')}}"></script>

    </body>
</html>
