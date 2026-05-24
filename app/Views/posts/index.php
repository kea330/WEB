<?php
ob_start();
?>
<h1>All Posts</h1>
<a class="btn" href="<?= ($base ?? '') ?>/posts/create">+ New Post</a>

<?php if (empty($posts)): ?>
    <p class="card">No posts yet. Create one!</p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <div class="card-header">
                <h2><a href="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(<?= (int) $post['id'] ?>)">•••</button>
                    <div id="menu-<?= (int) $post['id'] ?>" class="menu-dropdown">
                        <a href="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>/edit">Edit</a>
                        <form action="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            <button type="submit" class="menu-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <p><?= htmlspecialchars(mb_strimwidth($post['body'], 0, 120, '...')) ?></p>
            <small><?= htmlspecialchars($post['created_at'] ?? '') ?></small>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php
$content = ob_get_clean();
$title = 'Posts';
require __DIR__ . '/../layout.php';


