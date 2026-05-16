<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'MVC Blog') ?></title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; max-width: 720px; margin: 0 auto; padding: 1.5rem; background: #f5f5f5; color: #222; }
        nav { margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 2px solid #333; }
        nav a { margin-right: 1rem; color: #0066cc; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        .card { background: #fff; padding: 1rem; margin-bottom: 1rem; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .error { color: #b00020; font-size: 0.9rem; }
        label { display: block; margin-top: 0.75rem; font-weight: 600; }
        input, textarea { width: 100%; padding: 0.5rem; margin-top: 0.25rem; border: 1px solid #ccc; border-radius: 4px; }
        button, .btn { display: inline-block; margin-top: 1rem; padding: 0.5rem 1rem; background: #333; color: #fff; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 0.9rem; }
        button:hover, .btn:hover { background: #555; }
        .btn-danger { background: #b00020; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= ($base ?? '') ?>/">Home</a>
        <a href="<?= ($base ?? '') ?>/posts">All Posts</a>
        <a href="<?= ($base ?? '') ?>/posts/create">New Post</a>
    </nav>
    <?= $content ?? '' ?>
</body>
</html>


