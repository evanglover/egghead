<?php
namespace Documents;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use DateTime;

/** @ODM\Document */
class User {
    private const FACTIONS = array('Monarchy', 'Space', 'Pirate');

    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="string") */
    private $email;

    /** @ODM\Field(type="string") */
    private $password;

    /** @ODM\Field(type="string") */
    private $nickname;

    /** @ODM\Field(type="string") */
    private $faction;

    /** @ODM\Field(type="string") */
    private $description;

    /** @ODM\Field(type="string") */
    private $salt;

    /** @ODM\Field(type="string") */
    private $token;

    /** @ODM\Field(type="date") */
    private $dateCreated;

    /** @ODM\Field(type="int") */
    private $score = 0;  

    /** @ODM\ReferenceMany(targetDocument="Documents\Word") */
    private $words;

    /** @ODM\ReferenceMany(targetDocument="Documents\Word") */
    private $wordFavs;

    public function __construct(){
        $this->words = new ArrayCollection();
        $this->wordFavs = new ArrayCollection();
    }

    // BEGIN FUNCTIONS
    // Id only gets set once
    public function getId(): ?string { return $this->id; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $_email): void { $this->email = $_email; }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(string $_password): void { $this->password = $_password; }

    public function getNickname(): string { return $this->nickname; }
    public function setNickname($_nickname) { $this->nickname = $_nickname; }

    public function getFactions(): array { return self::FACTIONS; }
    public function getFaction(): ?string { return $this->faction; }
    public function setFaction(string $_faction): void { $this->faction = $_faction; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $_description): void { $this->description = $_description; }

    public function getSalt(): ?string { return $this->salt; }
    public function setSalt(string $_salt): void { $this->salt = $_salt; }

    public function getToken(): ?string { return $this->token; }
    public function setToken(string $_token): void { $this->token = $_token; }

    public function getDateCreated() { return $this->dateCreated; }
    public function setDateCreated(DateTime $_dateCreated) { $this->dateCreated = $_dateCreated; }

    public function getScore(): int { return $this->score; }
    public function incScore(): void { $this->score++; }
    public function decScore(): void { $this->score--; }

    public function getWords(): Collection { return $this->words; }
    public function addWord(Word $_word): void { $this->words[] = $_word; }

    public function getWordFavs(): Collection { return $this->wordFavs; }
    public function addWordFav(Word $_word): void { $this->wordFavs[] = $_word; }
}

?>