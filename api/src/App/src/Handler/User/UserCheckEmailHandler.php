<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
//use Zend\Expressive\Helper\BodyParams\BodyParamsMiddleware;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\MongoDB\BSON\UTCDateTime;

// Documents
use Documents\User;
use DateTime;

class UserCheckEmailHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
	    $params = $request->getParsedBody();

	    // params should include email and password
	    if(!empty($params['email'])){
	    	// VALIDATE EMAIL
	    	// Remove all illegal characters from email
			$email = filter_var($params['email'], FILTER_SANITIZE_EMAIL);

			// Validate e-mail
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    return new JsonResponse([
			    		'success' => false,
			    		'message' => 'invalid email'
			    	]);
			}

			$dm = $GLOBALS['odmDM'];
			// query database for user already exists
			$userQuery = $dm->createQueryBuilder('Documents\User');
	        $userQuery->field('email')->equals($params['email']);
	        // // EXECUTE QUERY
	        $userDoc = $userQuery->getQuery()->getSingleResult();
	        if(empty($userDoc){
	        	return new JsonResponse([
		    		'success' => true,
		    		'message' => 'OK'
		    	]);
	        } else {						        	
	        	return new JsonResponse([
		    		'success' => false,
		    		'message' => 'user already exists'
		    	]);
	        } 
						    
	    } else {
	    	return new JsonResponse([
	    		'success' => false,
	    		'message' => 'email is required'
	    	]);
	    }
    }
}
