<?php
namespace Documents;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use DateTime;

/**
 * @ODM\Document
 */
class Definition {

	private const WORD_CLASSES = array('noun', 'verb', 'adjective', 'adverb', 'pronoun', 'preposition', 'conjunction', 'determiner', 'exclamation');

    /** @ODM\Id */
	private $id;

    /** @ODM\ReferenceOne(targetDocument="Documents\User") */
	private $user;

    /** @ODM\ReferenceOne(targetDocument="Documents\Word") */
    private $word;

    /** @ODM\Field(type="string") */
	private $wordClass; // one of WORD_CLASSES

    /** @ODM\Field(type="string") */
	private $term;

    /** @ODM\Field(type="string") */
	private $origin;

	// NO PRIVACY WITH DEFINITIONS
    /** @ODM\Field(type="date") */
	private $dateSubmitted;

    /** @ODM\Field(type="int") */
	private $ups = 0;

    /** @ODM\Field(type="int") */
	private $downs = 0;

    // BEGIN FUNCTIONS
    public function getId(): ?string { return $this->id; } 

    public function getUser(): ?User { return $this->user; }
    public function setUser(User $_user): void { $this->user = $_user; }

    public function getWord(): ?Word { return $this->word; }
    public function setWord(Word $_word): void { $this->word = $_word; }

    public function getWordClasses(): array { return $this->WORD_CLASSES; }
    public function getWordClass(): ?string { return $this->wordClass; }
    public function setWordClass(string $_wordClass): void { $this->wordClass = $_wordClass; }

    public function getTerm(): ?string { return $this->term; }
    public function setTerm(string $_term): void { $this->term = $_term; }

    public function getOrigin(): ?string { return $this->origin; }
    public function setOrigin(string $_origin): void { $this->origin = $_origin; }

    public function getDateSubmitted() { return $this->dateSubmitted; }
    public function setDateSubmitted(DateTime $_dateSubmitted) { $this->dateSubmitted = $_dateSubmitted; }

    public function getUps(): int { return $this->ups; }
    public function incUps(): void { $this->ups++; }
    public function decUps(): void { $this->ups--; }

    public function getDowns(): int { return $this->downs; }
    public function incDowns(): void { $this->downs++; }
    public function decDowns(): void { $this->downs--; }
}

?>