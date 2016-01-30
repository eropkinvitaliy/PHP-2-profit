<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div>
        <article style="margin: 10%">
            <section style="padding-right: 20%">
                <h1><?php echo $article->title; ?></h1>

                <p><?php echo $article->description; ?></p>

                <p style="margin-bottom: 2px"><b>Опубликовано:</b> <?php echo $article->published; ?></p>

                <p style="margin-top: 2px "><b>Автор:</b> Петров пётр</p>
            </section>
        </article>
    <button style="background-color: cornflowerblue"><a href="/../App/Controllers/update.php?id=<?php echo $id?>">Изменить</a></button>
    <button style="background-color: red"><a href="/../App/Controllers/delete.php?id=<?php echo $id?>">Удалить</a></button>
    <button style="background-color: aliceblue"><a href="/../../index.php">Отмена</a></button>
</div>
</body>
</html>