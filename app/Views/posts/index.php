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
            <h2><a href="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
            <p><?= htmlspecialchars(mb_strimwidth($post['body'], 0, 120, '...')) ?></p>
            <small><?= htmlspecialchars($post['created_at'] ?? '') ?></small>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php
$content = ob_get_clean();
$title = 'Posts';
require __DIR__ . '/../layout.php';


