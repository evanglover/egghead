<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
//use Zend\Expressive\Helper\BodyParams\BodyParamsMiddleware;

use Doctrine\Common\Collections\ArrayCollection;

// Documents
use Documents\User;

class UserFactionsHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
    	return new JsonResponse(
    		User::getFactions()
    	);
    }
}
