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
        'controllers/userController.js'
    ], 'public/js/controller.js');

    mix.scripts([
        'services/usersApiService.js'
    ], 'public/js/userApi.js');

    mix.scripts([
        'values/configValues.js'
    ], 'public/js/configValues.js');
});