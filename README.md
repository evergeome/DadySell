<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Project

1. Install wamp or xamp to have PHP in your machine
2. Install composer to be able to install Laravel
3. run this code [ composer create-project laravel/laravel starter "6.*" ] to build laravel project
4. run this code [ php artisan serve ] to start the project
5. run thid code [ php artisan make:controller FirstController ] to build controller
6. run thid code [ php artisan route:list ] to list all routes
7. run thid code [ php artisan make:controller NewsController --resource ] to build resource controller
8. run this code [ composer require laravel/ui:* --dev ]
9. run this code [ php artisan ui vue --auth ]
10. run this code [ npm install && npm run dev]
11. run this code [ composer require laravel/socialite ]
12. add to config\app.php
    \Laravel\Socialite\SocialiteServiceProvider::class, as \* Application Service Providers...
    'socialite' => \Laravel\Socialite\Facades\Socialite::class, as Class Aliases
13. Task Schedule
    run this code [ php artisan make:command Deactivate ] to build task schedule command
    add schedule to App\Console\Kernal.php
    run this code [ php artisan schedule:list ] to list all Tasks
    run this code [ php artisan schedule:run ] to run task command
14. Mail
    run this code [ php artisan make:mail UsersCounter ] to build mail Controller
15. Models
    run this code [ php artisan make:model Offer ] to build Model
16. Multilanguage
    run this code [ composer require mcamara/laravel-localization ] to install mcamara package
    run this code [ php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider" ] to build config/laravellocalization.php
    add [
    'localize' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
    'localizationRedirect' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
    'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
    'localeCookieRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
    'localeViewPath' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
    ] to app\Http\Kernal.php
17. Request
    run this code [ php artisan make:request OfferRequest ] to build Request Validation Controller
18. Events and Listener
    run this code [ php artisan make:event VideoViewer ] to build Event
    run this code [ php artisan make:listener IncreaseCounter ] to build Listener
    Add your event and listener into EventServiceProvider.php
19. Middleware
    run this code [ php artisan make:middleware CheckRole ] to build Middleware Controller
    Add your middleware into Kernal.php

## Thanks

Done by Karim Ibrahim @2022
