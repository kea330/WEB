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
        nav a { margin-right: 1rem; color: #070707; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        .card { background: #fff; padding: 1rem; margin-bottom: 1rem; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem; }
        .card-header h2 { margin: 0; flex: 1; }
        .menu-container { position: relative; }
        .menu-btn { background: none; border: none; font-size: 1.5rem; color: #666; cursor: pointer; padding: 0.25rem 0.5rem; margin: 0; }
        .menu-btn:hover { color: #333; background: #f5f5f5; border-radius: 4px; }
        .menu-dropdown { display: none; position: absolute; right: 0; top: 100%; background: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,.15); min-width: 120px; z-index: 100; }
        .menu-dropdown.show { display: block; }
        .menu-dropdown a { display: block; padding: 0.5rem 1rem; text-decoration: none; color: #333; border-bottom: 1px solid #eee; }
        .menu-dropdown a:hover { background: #f5f5f5; }
        .menu-dropdown form { margin: 0; }
        .menu-delete { display: block; width: 100%; text-align: left; padding: 0.5rem 1rem; background: none; border: none; color: #b00020; cursor: pointer; font-size: 0.9rem; }
        .menu-delete:hover { background: #fee; }
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
    <script>
        function toggleMenu(postId) {
            const menu = document.getElementById('menu-' + postId);
            menu.classList.toggle('show');
            
            // Close other menus
            document.querySelectorAll('.menu-dropdown').forEach(m => {
                if (m.id !== 'menu-' + postId) {
                    m.classList.remove('show');
                }
            });
        }
        
        // Close menus when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.menu-container')) {
                document.querySelectorAll('.menu-dropdown').forEach(m => {
                    m.classList.remove('show');
                });
            }
        });
    </script>
</body>
</html>


