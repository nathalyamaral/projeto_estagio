var elixir = require('laravel-elixir');

elixir(function (mix){
    mix.sass('app.scss');

    mix.scripts([
        'clean-blog.min.js'
    ], 'public/js/blog.min.js');

    mix.scripts([
        'app.js'
    ], 'public/js/app.js');

    mix.scripts([
        'services/routes.js'
    ], 'public/js/routes.js');

    mix.scripts([
        'controllers/globalController.js',
        'controllers/userController.js',
        'controllers/navController.js'
    ], 'public/js/controller.js');

    mix.scripts([
        'controllers/vagasController.js'
    ], 'public/js/vagascontroller.js');

    mix.scripts([
        'models/userModel.js'
    ], 'public/js/models/userM.js');


    mix.scripts([
        'services/usersApiService.js'
    ], 'public/js/userApi.js');

    mix.scripts([
        'values/configValues.js'
    ], 'public/js/configValues.js');
});