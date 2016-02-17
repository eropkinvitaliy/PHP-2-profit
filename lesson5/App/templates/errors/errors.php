<?php include_once __DIR__ . '/../Layouts/header.php'; ?>

<div class="container">
    <div class="alert alert-danger" role="alert" style="font-size: large; ">
        <?php if (is_array($errors) || is_object($errors)): ?>
            <?php foreach ($errors as $error): ?>

                <span class="glyphicon glyphicon-exclamation-sign"
                      aria-hidden="true"></span><?php echo ' ' . $error->getMessage(); ?>
                <p></p>
            <?php endforeach ?>
        <?php else : ?>
            <span class="glyphicon glyphicon-exclamation-sign"
                  aria-hidden="true"></span><?php echo ' ' . $errors->getMessage(); ?>
        <?php endif ?>
    </div>
   <p> <a href="/admin/">Вернуться на главную страницу</a></p>
</div>

<?php include_once __DIR__ . '/../Layouts/footer.php'; ?>
