<?php

declare(strict_types=1);

namespace Coderun\Contracts\Utils;

use Coderun\Contracts\Vk\ImageSize;

use function usort;

trait SortSizeTrait
{
    /**
     * @return array<int, ImageSize
     */
    public function sortedSizeInDesOrder(): array
    {
        $sizes = $this->sizes;
        usort(
            $sizes,
            static function (ImageSize $size1, ImageSize $size2): int {
                if ($size1->getWidth() == $size2->getWidth()) {
                    return 0;
                }
                return $size1->getWidth() < $size2->getWidth() ? 1 : -1;
            }
        );
        return $sizes;
    }
}
