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
            <?php $pagetitle = $id ? 'Редактирование' : 'Добавление новости' ?>
            <h1> <?php echo $pagetitle; ?> <i><?php echo $article->title; ?></i></h1>

            <form method="post" action="/../App/Controllers/save.php">
                <p>Заголовок</p>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="title" value="<?php echo $article->title; ?>">

                <p>Текст новости</p>

                <p><textarea cols="100" rows="4" name="description"><?php echo $article->description; ?></textarea></p>

                <button type="submit" style="background-color: green">Сохранить</button>
                <button type="reset" style="background-color: aliceblue"><a
                        href="/App/Controllers/article.php">Отменить</a></button>

            </form>
            <?php if (!empty($id)): ?>
                <p style="margin-bottom: 2px"><b>Опубликовано:</b> <?php echo $article->published; ?></p>
                <p style="margin-top: 2px "><b>Автор:</b> Петров пётр</p>
            <?php endif ?>
        </section>
    </article>
</div>
</body>
</html>