<?php
ob_start();
?>
<h1>Create Post</h1>

<form method="post" action="<?= ($base ?? '') ?>/posts">
    <label>Title
        <input type="text" name="title" value="<?= htmlspecialchars($old['title'] ?? '') ?>">
    </label>
    <?php if (!empty($errors['title'])): ?>
        <p class="error"><?= htmlspecialchars($errors['title'][0]) ?></p>
    <?php endif; ?>

    <label>Body
        <textarea name="body" rows="6"><?= htmlspecialchars($old['body'] ?? '') ?></textarea>
    </label>
    <?php if (!empty($errors['body'])): ?>
        <p class="error"><?= htmlspecialchars($errors['body'][0]) ?></p>
    <?php endif; ?>

    <button type="submit">Save Post</button>
</form>
<?php
$content = ob_get_clean();
$title = 'New Post';
require __DIR__ . '/../layout.php';


