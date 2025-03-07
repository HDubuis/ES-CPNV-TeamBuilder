<?php

use Router\Router;
use App\Providers\Auth;
use App\Models\Members;
use App\Controllers\Error,
    App\Controllers\ErrorController;

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require dirname(dirname(__FILE__)) . '/config/config.php';
require APP_ROOT . '.env.php';



$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'App\Controllers\HomeController@index')->name('home');
$router->get('/membres', 'App\Controllers\MembersController@index')->name('members');
$router->post('/membre-:id/moderateur', 'App\Controllers\MembersController@defineModerator');
$router->get('/mes-equipes', 'App\Controllers\MyTeamsController@index')->name('my-teams');
$router->get('/equipe-:id', 'App\Controllers\TeamController@index')->name('team');
$router->post('/equipe', 'App\Controllers\TeamController@create');
$router->get('/moderateurs', 'App\Controllers\ModeratorsController@index')->name('moderators');
$router->get('/edit-profile-:id','App\Controllers\MembersController@editProfile');
$router->post('/edit-profile-:id','App\Controllers\MembersController@changeName');
$router->get('/profile-:id','App\Controllers\MembersController@profile')->name('profile');
//TODO Route pour la modification de profil par un modérateur

$router->post('/logout', 'App\Providers\Auth@logout');

session_start();

try {
    Auth::login(Members::find(USER_ID));
    $router->run();
} catch (PDOException $e) {
    (new ErrorController)->index(Error::DATABASE_ERROR);
}
