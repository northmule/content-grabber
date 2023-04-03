<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Handler;

use Coderun\Vkontakte\Collection\CommentsResponseMap;
use Coderun\Vkontakte\ModuleOptions;
use Coderun\Vkontakte\Options\Options;
use Coderun\Vkontakte\Service\ReceiveComment;
use Coderun\Vkontakte\ValueObject\WallGetComments;

/**
 * Class Comment
 *
 * @package Coderun\Vkontakte\Handler
 */
class Comment
{
    /** @var Options  */
    protected Options $options;
    /** @var ReceiveComment  */
    protected ReceiveComment $service;

    /**
     * @param ModuleOptions        $options
     * @param ReceiveComment $service
     */
    public function __construct(ModuleOptions $options, ReceiveComment $service)
    {
        $this->options = $options->getOptions();
        $this->service = $service;
    }

    public function get(int $ownerId, int $postId): CommentsResponseMap
    {
        $comments = $this->service->receive(new WallGetComments([
            'owner_id' => $ownerId,
            'post_id' => $postId,
        ]));
        if ($comments->getCount() === 0) {
            return new CommentsResponseMap();
        }
        $responseMap = new CommentsResponseMap();
        foreach ($comments->getItems() as $item) {
            $responseMap->offsetSet($item->getId(), $item);
        }
        return $responseMap;
    }
}
