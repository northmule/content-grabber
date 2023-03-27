<?php

declare(strict_types=1);

namespace Coderun\WordPress\Template;

use Coderun\Contracts\Vk\ImageSize;
use Coderun\Contracts\Vk\Photo;
use Coderun\Contracts\Vk\Post\Post as PostContract;

use function count;

/**
 * Class Post
 *
 * @package Coderun\WordPress\Template
 */
class Post extends AbstractTemplate
{
 
    /** @var string  */
    protected const TEMPLATE_NAME = 'post.twig';
    /** @var string  */
    protected const IMAGE_BEFORE_CONTENT = 'image_before_content';
    /** @var string  */
    protected const POST_CONTENT = 'post_content';
    /** @var string  */
    protected const IMAGE_AFTER_CONTENT = 'image_after_content';
    
    protected const CREATE_DATE = 'create_date';
    
    /**
     * @var array|int[]
     */
    protected array $indexOfPhotoInTemplate = [
        self::IMAGE_BEFORE_CONTENT => 0,
        self::IMAGE_AFTER_CONTENT => 1,
    ];
    
    /**
     * @param PostContract $post
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function compose(PostContract $post): string
    {
        return $this->twig->render(self::TEMPLATE_NAME, [
            self::IMAGE_AFTER_CONTENT => $this->getImageAfterContent($post),
            self::POST_CONTENT => $post->getText(),
            self::IMAGE_BEFORE_CONTENT => $this->getImageBeforeContent($post),
            self::CREATE_DATE => $this->getCreateDateTime(),
        ]);
    }
    
    /**
     * @param PostContract $post
     *
     * @return string|null
     */
    protected function getImageBeforeContent(PostContract $post): ?string
    {
        
        $sizes = $this->getLargerImageSize($this->indexOfPhotoInTemplate[self::IMAGE_BEFORE_CONTENT], $post);
        
        if (count($sizes) == 0
            || !$sizes[0] instanceof ImageSize) {
            return null;
        }
        
        return $sizes[0]->getUrl();
    }
    
    /**
     * @param PostContract $post
     *
     * @return string|null
     */
    protected function getImageAfterContent(PostContract $post): ?string
    {
        
        $sizes = $this->getLargerImageSize($this->indexOfPhotoInTemplate[self::IMAGE_AFTER_CONTENT], $post);
        
        if (count($sizes) == 0
            || !$sizes[0] instanceof ImageSize) {
            return null;
        }
        
        return $sizes[0]->getUrl();
    }
    
    /**
     * @param int          $index
     * @param PostContract $post
     *
     * @return array<int, ImageSize>
     */
    protected function getLargerImageSize(int $index, PostContract $post): array
    {
        $photo = null;
        $photoIndex = 0;
        foreach ($post->getAttachments() as $attachment) {
            if (!$attachment->getPhoto() instanceof Photo) {
                continue;
            }
            if ($index === $photoIndex) {
                $photo = $attachment->getPhoto();
                break;
            }
            
            $photoIndex++;
        }
        if (!$photo instanceof Photo) {
            return [];
        }
        
        return $photo->sortedSizeInDesOrder();
    }
}