<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body style="background-color: aliceblue;">

<div style="margin: 3% 10%;">
    <h1 style="text-align: center">Последние новости</h1>
    <?php foreach ($news as $article):?>
        <div style="border: 1px solid; border-radius: 5px;">
        <h3>
          <a href="/Views/article.php?id=<?php echo $article->id_news?>">
              <?php echo $article->title?>
          </a>
        </h3>
    <div style="margin: auto">
        <?php echo $article->description?>
    </div>
        </div>
    <?php endforeach ?>
</div>
</body>
</html>