<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Post;

/**
 * Repository uses the ORM under the hood (DIP — controller still sees the interface).
 */
final class SQLitePostRepository implements PostRepositoryInterface
{
    public function findAll(): array
    {
        return array_map(static fn (Post $post) => $post->toArray(), Post::all());
    }

    public function findById(int $id): ?array
    {
        $post = Post::find($id);

        return $post?->toArray();
    }

    public function create(array $data): int
    {
        $post = Post::create($data);

        return (int) $post->id;
    }

    public function update(int $id, array $data): bool
    {
        $post = Post::find($id);

        if ($post === null) {
            return false;
        }

        $post->fill($data);

        return $post->save();
    }

    public function delete(int $id): bool
    {
        $post = Post::find($id);

        return $post?->delete() ?? false;
    }
}
