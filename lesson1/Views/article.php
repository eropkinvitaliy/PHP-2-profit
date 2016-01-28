<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div>
    <?php foreach ($articles as $article): ?>
        <article style="margin: 10%">
            <section style="padding-right: 20%">
                <h1><?php echo $article->title; ?></h1>

                <p><?php echo $article->description; ?></p>

                <p style="margin-bottom: 2px"><b>Опубликовано:</b> <?php echo $article->published; ?></p>

                <p style="margin-top: 2px "><b>Автор:</b> Петров пётр</p>
            </section>
        </article>
    <?php endforeach ?>
    <a href="/../../index.php">На главную</a>
</div>
</body>
</html>