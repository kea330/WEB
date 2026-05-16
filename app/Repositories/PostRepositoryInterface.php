<?php

declare(strict_types=1);

namespace App\Repositories;

use Core\Database\Findable;
use Core\Database\Persistable;

/**
 * Full repo needs both read and write (ISP split at interface level).
 */
interface PostRepositoryInterface extends Findable, Persistable
{
}

