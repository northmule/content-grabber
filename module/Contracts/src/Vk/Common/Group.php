<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Common;

/**
 * Class Group
 *
 * @package Coderun\Contracts\Vk\Common
 */
class Group
{
    protected int $id;
    protected string $description;
    protected string $name;
    protected string $screenName;
    protected int $isClosed;
    protected string $type;
    protected string $photo50;
    protected string $photo100;
    protected string $photo200;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     *
     * @return Group
     */
    public function setId(int $id): Group
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @param string $description
     *
     * @return Group
     */
    public function setDescription(string $description): Group
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     *
     * @return Group
     */
    public function setName(string $name): Group
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * Get screenName
     *
     * @return string
     */
    public function getScreenName(): string
    {
        return $this->screenName;
    }
    
    /**
     * @param string $screenName
     *
     * @return Group
     */
    public function setScreenName(string $screenName): Group
    {
        $this->screenName = $screenName;
        return $this;
    }
    
    /**
     * Get isClosed
     *
     * @return int
     */
    public function getIsClosed(): int
    {
        return $this->isClosed;
    }
    
    /**
     * @param int $isClosed
     *
     * @return Group
     */
    public function setIsClosed(int $isClosed): Group
    {
        $this->isClosed = $isClosed;
        return $this;
    }
    
    /**
     * Get type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @param string $type
     *
     * @return Group
     */
    public function setType(string $type): Group
    {
        $this->type = $type;
        return $this;
    }
    
    /**
     * Get photo50
     *
     * @return string
     */
    public function getPhoto50(): string
    {
        return $this->photo50;
    }
    
    /**
     * @param string $photo50
     *
     * @return Group
     */
    public function setPhoto50(string $photo50): Group
    {
        $this->photo50 = $photo50;
        return $this;
    }
    
    /**
     * Get photo100
     *
     * @return string
     */
    public function getPhoto100(): string
    {
        return $this->photo100;
    }
    
    /**
     * @param string $photo100
     *
     * @return Group
     */
    public function setPhoto100(string $photo100): Group
    {
        $this->photo100 = $photo100;
        return $this;
    }
    
    /**
     * Get photo200
     *
     * @return string
     */
    public function getPhoto200(): string
    {
        return $this->photo200;
    }
    
    /**
     * @param string $photo200
     *
     * @return Group
     */
    public function setPhoto200(string $photo200): Group
    {
        $this->photo200 = $photo200;
        return $this;
    }

}
