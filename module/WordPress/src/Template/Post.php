<?php

declare(strict_types=1);

namespace Coderun\WordPress\Template;

use Coderun\Contracts\Vk\Common\Group;
use Coderun\Contracts\Vk\ImageSize;
use Coderun\Contracts\Vk\Photo;
use Coderun\Contracts\Vk\Post\Post as PostContract;

use function count;
use function sprintf;
use function abs;

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
    protected const POST_URL_ORIGINAL = 'post_url_original';

    /**
     * @var array|int[]
     */
    protected array $indexOfPhotoInTemplate = [
        self::IMAGE_BEFORE_CONTENT => 0,
        self::IMAGE_AFTER_CONTENT  => 1,
    ];

    /**
     * @param PostContract $post
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function compose(PostContract $post, ?Group $group): string
    {
        return $this->twig->render(self::TEMPLATE_NAME, [
            self::IMAGE_AFTER_CONTENT  => $this->getImageAfterContent($post),
            self::POST_CONTENT         => $post->getText(),
            self::IMAGE_BEFORE_CONTENT => $this->getImageBeforeContent($post),
            self::CREATE_DATE          => $this->getCreateDateTime(),
            self::POST_URL_ORIGINAL    => $this->getPostUrlOriginal($post, $group),
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

        if (
            count($sizes) == 0
            || !$sizes[0] instanceof ImageSize
        ) {
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

        if (
            count($sizes) == 0
            || !$sizes[0] instanceof ImageSize
        ) {
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
    
    /**
     * @param PostContract $post
     * @param Group|null   $group
     *
     * @return string
     */
    protected function getPostUrlOriginal(PostContract $post, ?Group $group): string
    {
        $clubPrefix = $post->getOwnerId() < 0 ? 'club' : '';
        if ($group instanceof Group) {
            $clubPrefix = $group->getType() === 'page' ? 'public' : 'club';
        }
        
        return sprintf(
            'https://vk.com/%s%s?w=wall-%s_%s',
            $clubPrefix,
            abs($post->getOwnerId()),
            abs($post->getOwnerId()),
            $post->getId()
        );
    }
}
