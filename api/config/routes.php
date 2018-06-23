<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/*

EGGHEAD OBJECTS

Word
	- id
	- term
	- ~popularity
	- ~categories
	- Definition []
		- id
		- User
		- dateCreated
		- wordClass{noun, verb, adjective, adverb, pronoun, preposition, conjunction, determiner, exclamation}
		- term
		- usage
		- origin
		===============
		- public
		- dateSubmitted
		- upvotes
		- downvotes

Deck
	- id
	- User
	- dateCreated
	- title
	- Cards [] // array of Cards
		- Word
		- Definition
		- Familiarity (1 - 5)
		- Priority (1 - 5)
	===============
	- public
	- dateSubmitted
	- upvotes
	- downvotes

User
	- id
	- name
	- dateCreated
	- aliases[]
	- description
	- score
	- faction ( rank within {Monarchy, Space, Pirate})
	- email / social
	- password +encrypted+

*/

return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', App\Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');
    $app->get('/api/', App\Handler\CheckHandler::class, 'api.check');
    // Word
    $app->get('/api/words', App\Handler\Word\WordSearchHandler::class, 'words');
    $app->get('/api/word', App\Handler\Word\WordGetHandler::class, 'word');
    // User
    $app->post('/api/register', App\Handler\User\UserRegisterHandler::class, 'user.register');
    $app->put('/api/login', App\Handler\User\UserLoginHandler::class, 'user.login');
    $app->get('/api/user/factions', App\Handler\User\UserFactionsHandler::class, 'user.factions');

};
