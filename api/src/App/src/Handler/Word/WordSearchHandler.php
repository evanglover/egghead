<?php

declare(strict_types=1);

namespace App\Handler\Word;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\MongoDB\BSON\UTCDateTime;

// Documents
use Documents\Word;
use Documents\User;
use DateTime;

class WordSearchHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
    	$dm = $GLOBALS['odmDM'];
        // BUILD THE QUERY
        $wordQuery = $dm->createQueryBuilder('Documents\Word');
        if(isset($_GET["term"])){
            $searchTerm = $_GET["term"];
            $searchReg = "/" . $searchTerm . "/i";
            $wordQuery->field('term')
            ->equals(new \MongoRegex($searchReg));
        }
        // EXECUTE QUERY
        $wordsDoc = $wordQuery->getQuery()->execute();
    	
        // PROCESS RESUTLS

        $words = array();
        // find all words
        foreach ($wordsDoc as $wordDoc){
            $userDoc = $wordDoc->getUser();
            // set word vars
            $word = [
                'id' => $wordDoc->getId(),
                'user' => [
                    'id' => $userDoc->getId(),
                    'name' => $userDoc->getFirst() . ' ' . $userDoc->getLast(),
                    'score' => $userDoc->getScore()
                ],
                'term' => $wordDoc->getTerm(),
                'wordClass' => $wordDoc->getWordClass(),
                'definition' => $wordDoc->getDefinition(),
                'origin' => $wordDoc->getOrigin(),
                'categories' => $wordDoc->getCategories(),
                'dateSubmitted' => $wordDoc->getDateSubmitted(),
                'ups' => $wordDoc->getUps(),
                'downs' => $wordDoc->getDowns()
            ];

            array_push($words, $word);
        }

        // RETURN RESULTS

        return new JsonResponse($words);
    }
}
