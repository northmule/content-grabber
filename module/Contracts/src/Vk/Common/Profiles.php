<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Common;

/**
 * Class Profiles
 *
 * @package Coderun\Contracts\Vk\Common
 *
 * @see https://vk.com/dev/account.getProfileInfo
 */
class Profiles
{
    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected int $sex;
    protected string $screenName;
    protected string $photo50;
    protected string $photo100;

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
     * @return Profiles
     */
    public function setId(int $id): Profiles
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Profiles
     */
    public function setFirstName(string $firstName): Profiles
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Profiles
     */
    public function setLastName(string $lastName): Profiles
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get sex
     *
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     *
     * @return Profiles
     */
    public function setSex(int $sex): Profiles
    {
        $this->sex = $sex;
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
     * @return Profiles
     */
    public function setScreenName(string $screenName): Profiles
    {
        $this->screenName = $screenName;
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
     * @return Profiles
     */
    public function setPhoto50(string $photo50): Profiles
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
     * @return Profiles
     */
    public function setPhoto100(string $photo100): Profiles
    {
        $this->photo100 = $photo100;
        return $this;
    }
}
