<?php

namespace Proxies\__CG__\Documents;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Word extends \Documents\Word implements \Doctrine\ODM\MongoDB\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Documents\\Word' . "\0" . 'id', '' . "\0" . 'Documents\\Word' . "\0" . 'user', '' . "\0" . 'Documents\\Word' . "\0" . 'term', '' . "\0" . 'Documents\\Word' . "\0" . 'wordClass', '' . "\0" . 'Documents\\Word' . "\0" . 'definition', '' . "\0" . 'Documents\\Word' . "\0" . 'origin', '' . "\0" . 'Documents\\Word' . "\0" . 'categories', '' . "\0" . 'Documents\\Word' . "\0" . 'dateSubmitted', '' . "\0" . 'Documents\\Word' . "\0" . 'votes'];
        }

        return ['__isInitialized__', '' . "\0" . 'Documents\\Word' . "\0" . 'id', '' . "\0" . 'Documents\\Word' . "\0" . 'user', '' . "\0" . 'Documents\\Word' . "\0" . 'term', '' . "\0" . 'Documents\\Word' . "\0" . 'wordClass', '' . "\0" . 'Documents\\Word' . "\0" . 'definition', '' . "\0" . 'Documents\\Word' . "\0" . 'origin', '' . "\0" . 'Documents\\Word' . "\0" . 'categories', '' . "\0" . 'Documents\\Word' . "\0" . 'dateSubmitted', '' . "\0" . 'Documents\\Word' . "\0" . 'votes'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Word $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?string
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): ?\Documents\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\Documents\User $_user): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$_user]);

        parent::setUser($_user);
    }

    /**
     * {@inheritDoc}
     */
    public function getTerm(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTerm', []);

        return parent::getTerm();
    }

    /**
     * {@inheritDoc}
     */
    public function setTerm(string $_term): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTerm', [$_term]);

        parent::setTerm($_term);
    }

    /**
     * {@inheritDoc}
     */
    public function getWordClasses(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWordClasses', []);

        return parent::getWordClasses();
    }

    /**
     * {@inheritDoc}
     */
    public function getWordClass(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWordClass', []);

        return parent::getWordClass();
    }

    /**
     * {@inheritDoc}
     */
    public function setWordClass(string $_wordClass): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWordClass', [$_wordClass]);

        parent::setWordClass($_wordClass);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefinition(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefinition', []);

        return parent::getDefinition();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefinition(string $_definition): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefinition', [$_definition]);

        parent::setDefinition($_definition);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrigin(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrigin', []);

        return parent::getOrigin();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrigin(string $_origin): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrigin', [$_origin]);

        parent::setOrigin($_origin);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategories(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategories', []);

        return parent::getCategories();
    }

    /**
     * {@inheritDoc}
     */
    public function setCategories($_categories): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategories', [$_categories]);

        parent::setCategories($_categories);
    }

    /**
     * {@inheritDoc}
     */
    public function addCategory($_category): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCategory', [$_category]);

        parent::addCategory($_category);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateSubmitted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateSubmitted', []);

        return parent::getDateSubmitted();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateSubmitted(\DateTime $_dateSubmitted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateSubmitted', [$_dateSubmitted]);

        return parent::setDateSubmitted($_dateSubmitted);
    }

    /**
     * {@inheritDoc}
     */
    public function getVotes(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVotes', []);

        return parent::getVotes();
    }

    /**
     * {@inheritDoc}
     */
    public function addVote($_id, $_up): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addVote', [$_id, $_up]);

        parent::addVote($_id, $_up);
    }

    /**
     * {@inheritDoc}
     */
    public function flipVote($_id): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'flipVote', [$_id]);

        parent::flipVote($_id);
    }

    /**
     * {@inheritDoc}
     */
    public function removeVote($_id): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeVote', [$_id]);

        parent::removeVote($_id);
    }

}
