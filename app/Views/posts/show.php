<?php
ob_start();
?>
<div class="card">
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['body'])) ?></p>
    <small>Posted: <?= htmlspecialchars($post['created_at'] ?? '') ?></small>
</div>

<a class="btn" href="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>/edit">Edit</a>
<a class="btn" href="<?= ($base ?? '') ?>/posts">Back to list</a>

<form method="post" action="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>/delete" style="display:inline" onsubmit="return confirm('Delete this post?');">
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
<?php
$content = ob_get_clean();
$title = htmlspecialchars($post['title']);
require __DIR__ . '/../layout.php';


