<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <article style="margin: 10%">
        <section style="padding-right: 20%">
            <?php $pagetitle = !empty($article->id_news) ? 'Редактирование' : 'Добавление новости' ?>
            <h1> <?php echo $pagetitle; ?> <i><?php echo $article->title; ?></i></h1>

            <form method="post" action="/admin/save/">
                <p>Заголовок</p>
                <input type="hidden" name="id_news" value="<?php echo $article->id_news; ?>">
                <input type="text" name="title" value="<?php echo $article->title; ?>">

                <p>Текст новости</p>

                <p><textarea cols="100" rows="4" name="description"><?php echo $article->description; ?></textarea></p>

                <button type="submit" style="background-color: green">Сохранить</button>
                <button type="reset" style="background-color: aliceblue"><a
                        href="/admin/one/">Отменить</a></button>

            </form>
            <?php if (!empty($id)): ?>
                <p style="margin-bottom: 2px"><b>Опубликовано:</b> <?php echo $article->published; ?></p>
                <p style="margin-top: 2px "><b>Автор:</b> Петров пётр</p>
            <?php endif ?>
        </section>
    </article>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>