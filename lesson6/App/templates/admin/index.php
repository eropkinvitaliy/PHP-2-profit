<?php include_once __DIR__ . '/../Layouts/index.html'; ?>

    <div class="container">
        <h1>Новости</h1>
        <button class="btn btn-success btn-md" style="margin-bottom: 5px">
            <a href="/admin/create" style="text-decoration: none; color: white"> Написать свою новость</a>
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
                        <?php if (!empty($article->author)): ?>
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
<?php include_once __DIR__ . '/../Layouts/footer.php'; ?>
