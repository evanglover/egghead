<?php

declare(strict_types=1);

namespace App\Handler\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\MongoDB\BSON\UTCDateTime;

// Documents
use Documents\User;
use DateTime;

class UserLoginHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
    	// $dm = $GLOBALS['odmDM'];
     //    $word;
     //    // BUILD THE QUERY
     //    $wordQuery = $dm->createQueryBuilder('Documents\Word');
     //    if(isset($_GET["id"])){
     //        $searchTerm = $_GET["id"];
     //        $wordQuery->field('id')->equals($searchTerm);
     //    }
     //    // // EXECUTE QUERY
     //    $wordDoc = $wordQuery->getQuery()->getSingleResult();
    	
     //    if($wordDoc == NULL){
     //        return new JsonResponse(false);
     //    }
     //    // PROCESS RESUTLS
     //    $userDoc = $wordDoc->getUser();
     //    // set word vars
     //    $word = [
     //        'id' => $wordDoc->getId(),
     //        'user' => [
     //            'id' => $userDoc->getId(),
     //            'name' => $userDoc->getFirst() . ' ' . $userDoc->getLast(),
     //            'score' => $userDoc->getScore()
     //        ],
     //        'term' => $wordDoc->getTerm(),
     //        'wordClass' => $wordDoc->getWordClass(),
     //        'definition' => $wordDoc->getDefinition(),
     //        'origin' => $wordDoc->getOrigin(),
     //        'categories' => $wordDoc->getCategories(),
     //        'dateSubmitted' => $wordDoc->getDateSubmitted(),
     //        'ups' => $wordDoc->getUps(),
     //        'downs' => $wordDoc->getDowns()
     //    ];


        // RETURN RESULTS

        return new JsonResponse($_SERVER);
    }
}
