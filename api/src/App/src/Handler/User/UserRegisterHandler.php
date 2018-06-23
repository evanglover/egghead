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

class UserRegisterHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
	    $params = $request->getParsedBody();

	    $dm = $GLOBALS['odmDM'];

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

	    	if(!empty($params['password'])){
				if(!empty($params['nickname'])){
					// query database for user already exists
		    		$userQuery = $dm->createQueryBuilder('Documents\User');
		            $userQuery->field('nickname')->equals($params['nickname']);
			        // // EXECUTE QUERY
			        $userDoc = $userQuery->getQuery()->getSingleResult();
			        if(empty($userDoc)){
    					if(!empty($params['faction'])){
    						// VALIDATE FACTION
    						if (!in_array($params['faction'], User::getFactions())) {
							    return new JsonResponse([
							    		'success' => false,
							    		'message' => 'invalid faction'
							    	]);
							}
				    		
				    		// query database for user already exists
				    		$userQuery = $dm->createQueryBuilder('Documents\User');
				            $userQuery->field('email')->equals($params['email']);
					        // // EXECUTE QUERY
					        $userDoc = $userQuery->getQuery()->getSingleResult();
					        if(empty($userDoc)){
					        	$user = new User();
					        	$user->setEmail($params['email']);
						    	$salt = bin2hex(random_bytes(8));
						    	$user->setSalt($salt);
						    	$user->setPassword(password_hash($salt . $params['password'], PASSWORD_DEFAULT));
						    	$user->setNickname($params['nickname']);
						    	$user->setFaction($params['faction']);
						    	$user->setDateCreated(new DateTime());
						    	if(!empty($params['description'])){
						    		$user->setDescription($params['description']);
						    	}
						    	$dm->persist($user);
						    	$dm->flush();

						    	return new JsonResponse([
						    		'success' => true,
						    		'message' => 'you are registered!'
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
					    		'message' => 'faction is required'
					    	]);
					    }
					} else {
				    	return new JsonResponse([
				    		'success' => false,
				    		'message' => 'nickname is taken'
				    	]);
				    }
			    } else {
			    	return new JsonResponse([
			    		'success' => false,
			    		'message' => 'nickname is required'
			    	]);
			    }
	    	} else {
	    		return new JsonResponse([
		    		'success' => false,
		    		'message' => 'password is required'
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
