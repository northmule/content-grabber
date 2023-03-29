<?php

declare(strict_types=1);

namespace Coderun\ORM\Repository;

use Doctrine\ORM\EntityRepository;

class Common extends EntityRepository
{
    /**
     * @param string $uuid
     *
     * @return object|null
     */
    public function findByUuid(string $uuid): ?object
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }
}
