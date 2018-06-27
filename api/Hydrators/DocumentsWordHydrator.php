<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\Query\Query;
use Doctrine\ODM\MongoDB\UnitOfWork;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadataInfo;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class DocumentsWordHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id']) || (! empty($this->class->fieldMappings['id']['nullable']) && array_key_exists('_id', $data))) {
            $value = $data['_id'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['id']['type'];
                $return = $value instanceof \MongoId ? (string) $value : $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @ReferenceOne */
        if (isset($data['user'])) {
            $reference = $data['user'];
            $className = $this->unitOfWork->getClassNameForAssociation($this->class->fieldMappings['user'], $reference);
            $mongoId = ClassMetadataInfo::getReferenceId($reference, $this->class->fieldMappings['user']['storeAs']);
            $targetMetadata = $this->dm->getClassMetadata($className);
            $id = $targetMetadata->getPHPIdentifierValue($mongoId);
            $return = $this->dm->getReference($className, $id);
            $this->class->reflFields['user']->setValue($document, $return);
            $hydratedData['user'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['term']) || (! empty($this->class->fieldMappings['term']['nullable']) && array_key_exists('term', $data))) {
            $value = $data['term'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['term']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['term']->setValue($document, $return);
            $hydratedData['term'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['wordClass']) || (! empty($this->class->fieldMappings['wordClass']['nullable']) && array_key_exists('wordClass', $data))) {
            $value = $data['wordClass'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['wordClass']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['wordClass']->setValue($document, $return);
            $hydratedData['wordClass'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['definition']) || (! empty($this->class->fieldMappings['definition']['nullable']) && array_key_exists('definition', $data))) {
            $value = $data['definition'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['definition']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['definition']->setValue($document, $return);
            $hydratedData['definition'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['origin']) || (! empty($this->class->fieldMappings['origin']['nullable']) && array_key_exists('origin', $data))) {
            $value = $data['origin'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['origin']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['origin']->setValue($document, $return);
            $hydratedData['origin'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['categories']) || (! empty($this->class->fieldMappings['categories']['nullable']) && array_key_exists('categories', $data))) {
            $value = $data['categories'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['categories']['type'];
                $return = $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['categories']->setValue($document, $return);
            $hydratedData['categories'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['dateSubmitted'])) {
            $value = $data['dateSubmitted'];
            if ($value === null) { $return = null; } else { $return = \Doctrine\ODM\MongoDB\Types\DateType::getDateTime($value); }
            $this->class->reflFields['dateSubmitted']->setValue($document, clone $return);
            $hydratedData['dateSubmitted'] = $return;
        }

        /** @Field(type="collection") */
        if (isset($data['votes']) || (! empty($this->class->fieldMappings['votes']['nullable']) && array_key_exists('votes', $data))) {
            $value = $data['votes'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['votes']['type'];
                $return = $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['votes']->setValue($document, $return);
            $hydratedData['votes'] = $return;
        }
        return $hydratedData;
    }
}