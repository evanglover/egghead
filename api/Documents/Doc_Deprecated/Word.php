<?php
namespace Documents;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** 
 * @ODM\Document
 */
class Word {
    // BEGIN VARIABLES

    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="string") @ODM\UniqueIndex */
    private $term;

    /** @ODM\ReferenceMany(targetDocument="Documents\Definition") */
    private $definitions;

    public function __construct(){
        $this->definitions = new ArrayCollection();
    }

    // BEGIN FUNCTIONS

    // Id only gets set once
    public function getId(): ?string { return $this->id; }

    public function getTerm(): ?string { return $this->term; }
    public function setTerm(string $_term): void { $this->term = $_term; }

    public function getDefinitions(): Collection { return $this->definitions; }
    public function addDefinition(Definition $_definition): void { $this->definitions[] = $_definition; }

}

?>