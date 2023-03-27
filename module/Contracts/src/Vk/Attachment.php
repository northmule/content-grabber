<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk;

/**
 * Class Attachment
 *
 * @package Coderun\Contracts\Vk
 */
class Attachment
{
    protected string $type;
    protected ?Photo $photo = null;
    protected ?Link $link = null;

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
     * @return Attachment
     */
    public function setType(string $type): Attachment
    {
        $this->type = $type;
        return $this;
    }
    
    /**
     * Get photo
     *
     * @return Photo|null
     */
    public function getPhoto(): ?Photo
    {
        return $this->photo;
    }

    /**
     * @param Photo $photo
     *
     * @return Attachment
     */
    public function setPhoto(Photo $photo): Attachment
    {
        $this->photo = $photo;
        return $this;
    }
    
    /**
     * Get link
     *
     * @return Link|null
     */
    public function getLink(): ?Link
    {
        return $this->link;
    }

    /**
     * @param Link $link
     *
     * @return Attachment
     */
    public function setLink(Link $link): Attachment
    {
        $this->link = $link;
        return $this;
    }
}
