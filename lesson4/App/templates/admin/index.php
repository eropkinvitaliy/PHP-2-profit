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
    <h1>Новости</h1>
    <button class="btn btn-success btn-md" style="margin-bottom: 5px">
    <a href="/admin/create" style="text-decoration: none; color: white">    Написать свою новость</a>
    </button>
    <?php if (!empty($news)): ?>
        <?php foreach ($news as $article) : ?>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <a href="/admin/one/?id=<?php echo $article->id_news ?>">
                        <h4>    <?php echo $article->title; ?></h4></a>
                </div>
                <div class="panel-body"><?php echo $article->description; ?>
                    <p><a href="/admin/one/?id=<?php echo $article->id_news ?>">Подробно >>></a></p>
                </div>
                <div class="panel-footer" style="font-size: small">
                    <?php if (!empty($article->author)):?>
                    <p><b>Автор
                            : </b><i> <?php echo $article->author->firstname . ' ' . $article->author->lastname; ?></i>
                    </p>
                <?php endif ?>
                    <p><b>Опубликовано: <?php echo $article->published; ?></b></p>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else : ?>
        <h2>Новостей пока нет. Добавьте свою новость</h2>
    <?php endif ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>