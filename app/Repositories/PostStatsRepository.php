<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Post;
use Core\Database\Findable;

/**
 * Read-only repo — uses ORM count(), only implements Findable (ISP).
 */
final class PostStatsRepository implements Findable
{
    public function findAll(): array
    {
        return array_map(static fn (Post $post) => $post->toArray(), Post::all());
    }

    public function findById(int $id): ?array
    {
        return Post::find($id)?->toArray();
    }

    public function count(): int
    {
        return Post::count();
    }
}
