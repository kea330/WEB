<?php
ob_start();
?>
<div class="card">
    <h1><?= htmlspecialchars($title) ?></h1>
    <p>This is my custom PHP MVC framework final project.</p>
    <p>There are currently <strong><?= (int) $postCount ?></strong> blog post(s) in the database.</p>
    <a class="btn" href="<?= ($base ?? '') ?>/posts">View posts</a>
</div>
<?php
$content = ob_get_clean();
$title = 'Home - MVC Blog';
require __DIR__ . '/../layout.php';


