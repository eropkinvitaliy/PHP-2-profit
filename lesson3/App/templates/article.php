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
    <button style="background-color: cornflowerblue"><a href="/../App/Controllers/update.php?id=<?php echo $id?>">Изменить</a></button>
    <button style="background-color: red"><a href="/../App/Controllers/delete.php?id=<?php echo $id?>">Удалить</a></button>
    <button style="background-color: aliceblue"><a href="/../../index.php">На главную</a></button>
        <div class="panel panel-success">
            <div class="panel-heading">
                <a href="/App/Controllers/article.php?id=<?php echo $article->id_news ?>">
                    <h1>    <?php echo $article->title; ?></h1></a>
            </div>
            <div class="panel-body"><?php echo $article->description; ?>
                <p><a href="/App/Controllers/article.php?id=<?php echo $article->id_news ?>"></a></p>
            </div>
            <div class="panel-footer" style="font-size: small"><p><b>Автор
                        : </b><i> <?php echo $article->author->firstname . ' ' . $article->author->lastname; ?></i></p>
                <p><b>Опубликовано: <?php echo $article->published; ?></b></p>
            </div>
        </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>