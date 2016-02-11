<?php include_once __DIR__ . '/../Layouts/header.php' ;?>

<div class="container">
    <button style="background-color: aliceblue"><a href="/">На главную</a></button>
        <div class="panel panel-success">
            <div class="panel-heading">
                    <h1> <?php echo $article->title; ?></h1>
            </div>
            <div class="panel-body"><?php echo $article->description; ?>
            </div>
            <div class="panel-footer" style="font-size: small"><p><b>Автор
                        : </b><i> <?php echo $article->author->firstname . ' ' . $article->author->lastname; ?></i></p>
                <p><b>Опубликовано: <?php echo $article->published; ?></b></p>
            </div>
        </div>
</div>
<?php include_once __DIR__ . '/../Layouts/footer.php' ;?>