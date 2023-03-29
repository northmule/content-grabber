<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    return false;
}

return require realpath(__DIR__) . '/container.php';