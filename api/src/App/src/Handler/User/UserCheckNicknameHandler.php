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

class UserCheckNicknameHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
	    $params = $request->getParsedBody();

	    // params should include email and password
	    if(!empty($params['nickname'])){
			$dm = $GLOBALS['odmDM'];
			// query database for user already exists
			$userQuery = $dm->createQueryBuilder('Documents\User');
	        $userQuery->field('nickname')->equals($params['nickname']);
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
		    		'message' => 'nickname is taken'
		    	]);
	        } 
						    
	    } else {
	    	return new JsonResponse([
	    		'success' => false,
	    		'message' => 'nickname is required'
	    	]);
	    }
    }
}
}
