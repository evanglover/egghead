<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

use Doctrine\Common\Collections\ArrayCollection;

// Documents
use Documents\Word;
use Documents\Definition;
use Documents\User;
use DateTime;

class CheckHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
    	

    	$dm = $GLOBALS['odmDM'];

    	$user = new User();
    	$user = $dm->find('Documents\User', "5b304e3825b6963938003fde");
    	// $user->setName("Joe Schmoe");
    	// $user->setDateCreated(new DateTime());
    	// $user->setDescription("This is my super cool description");

    	$word = new Word();
    	
    	// $word = $dm->find('Documents\Word', "5b1dad0725b69685f9004c96");

    	$word->setUser($user);
    	$word->setTerm("ABC");
    	$word->setWordClass("noun");
    	$word->setDefinition("ABC - 1");
    	$word->setOrigin("The Test Realm");
    	$word->setCategories(array("C1","C2","C3"));
    	$word->setDateSubmitted(new DateTime());

    	$user->addWord($word);

    	$dm->persist($word);
    	//$dm->persist($user);
    	$dm->flush();

        $response = "No DM";
        if(isset($dm)){
            $response = "DONE";
        }

        // $token = 'token=' . bin2hex(random_bytes(64));
        // $cookieHeader = ['Set-Cookie' => 'token=' . $token . '; HttpOnly'];
        // $response = new JsonResponse($_COOKIE,200,$cookieHeader);
        
        // $response = new JsonResponse(session_get_cookie_params());
        $response = new JsonResponse($response);
        return $response;
    }
}
