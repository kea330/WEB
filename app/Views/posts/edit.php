<?php
ob_start();
?>
<h1>Edit Post</h1>

<form method="post" action="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>/update">
    <label>Title
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>">
    </label>
    <?php if (!empty($errors['title'])): ?>
        <p class="error"><?= htmlspecialchars($errors['title'][0]) ?></p>
    <?php endif; ?>

    <label>Body
        <textarea name="body" rows="6"><?= htmlspecialchars($post['body']) ?></textarea>
    </label>
    <?php if (!empty($errors['body'])): ?>
        <p class="error"><?= htmlspecialchars($errors['body'][0]) ?></p>
    <?php endif; ?>

    <button type="submit">Update</button>
    <a class="btn" href="<?= ($base ?? '') ?>/posts/<?= (int) $post['id'] ?>">Cancel</a>
</form>
<?php
$content = ob_get_clean();
$title = 'Edit - ' . $post['title'];
require __DIR__ . '/../layout.php';


