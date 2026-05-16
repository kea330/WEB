<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database\ORM\Model;

/**
 * Post ORM model — maps to the `posts` table.
 *
 * Usage:
 *   Post::all();
 *   Post::find(1);
 *   Post::create(['title' => 'Hi', 'body' => '...']);
 */
final class Post extends Model
{
    protected static string $table = 'posts';

    protected array $fillable = [
        'title',
        'body',
    ];
}
