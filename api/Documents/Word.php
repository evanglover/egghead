<?php
namespace Documents;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use DateTime;

/**
 * @ODM\Document
 */
class Word {

	private const WORD_CLASSES = array('noun', 'verb', 'adjective', 'adverb', 'pronoun', 'preposition', 'conjunction', 'determiner', 'exclamation');

    /** @ODM\Id */
	private $id;

    /** @ODM\ReferenceOne(targetDocument="Documents\User") */
	private $user;

    /** @ODM\Field(type="string") */
    private $term;

    /** @ODM\Field(type="string") */
	private $wordClass; // one of WORD_CLASSES

    /** @ODM\Field(type="string") */
	private $definition;

    /** @ODM\Field(type="string") */
	private $origin;

    /** @ODM\Field(type="collection") */
    private $categories = array();

	// NO PRIVACY WITH DEFINITIONS
    /** @ODM\Field(type="date") */
	private $dateSubmitted;

    // Collection of user votes [Id => (true = "up" || false = "down")]
    /** @ODM\Field(type="collection") */
    private $votes = array();

    // BEGIN FUNCTIONS
    public function getId(): ?string { return $this->id; } 

    public function getUser(): ?User { return $this->user; }
    public function setUser(User $_user): void { $this->user = $_user; }

    public function getTerm(): ?string { return $this->term; }
    public function setTerm(string $_term): void { $this->term = $_term; }

    public function getWordClasses(): array { return self::WORD_CLASSES; }
    public function getWordClass(): ?string { return $this->wordClass; }
    public function setWordClass(string $_wordClass): void { $this->wordClass = $_wordClass; }

    public function getDefinition(): ?string { return $this->definition; }
    public function setDefinition(string $_definition): void { $this->definition = $_definition; }

    public function getOrigin(): ?string { return $this->origin; }
    public function setOrigin(string $_origin): void { $this->origin = $_origin; }

    public function getCategories(): array { return $this->categories; }
    public function addCategory($_category): void { $this->categories[] = $_category; }

    public function getDateSubmitted() { return $this->dateSubmitted; }
    public function setDateSubmitted(DateTime $_dateSubmitted) { $this->dateSubmitted = $_dateSubmitted; }

    public function getVotes(): array { return $this->votes; }
    public function addVote($_id, $_up): void { $this->votes[$_id] = $_up; }
    public function flipVote($_id): void { $this->votes[$_id] = !$this->votes[$_id]; }
    public function removeVote($_id): void { unset($this->votes[$_id]); }
}

?>