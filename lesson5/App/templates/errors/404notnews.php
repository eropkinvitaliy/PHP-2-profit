<?php include_once __DIR__ . '/../Layouts/header.php' ;?>

<div class="container">
    <h1>Этой новости нет</h1>
    <button class="btn btn-success btn-md" style="margin-bottom: 5px">
        <?php if($erroradmin): ?>
        <a href="/admin/" style="text-decoration: none; color: white">    Вернуться на главную страницу</a>
            <?php else: ?>
            <a href="/" style="text-decoration: none; color: white">    Вернуться на главную страницу</a>
    <?php endif ?>
    </button>
</div>

<?php include_once __DIR__ . '/../Layouts/footer.php' ;?>