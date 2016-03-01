<?php include_once __DIR__ . '/../Layouts/index.html'; ?>

    <div class="container">
        <article style="margin: 10%">
            <section style="padding-right: 20%">
                <?php $pagetitle = !empty($article->id_news) ? 'Редактирование' : 'Добавление новости' ?>
                <h1> <?php echo $pagetitle; ?> <i style="color: green"><?php echo $article->title; ?></i></h1>

                <form method="post" action="/admin/save/">
                    <h3>Заголовок</h3>
                    <input type="hidden" name="id_news" value="<?php echo $article->id_news; ?>">
                    <input type="text" name="title" value="<?php echo $article->title; ?>">

                    <h3>Текст новости</h3>

                    <p><textarea cols="100" rows="4" name="description"><?php echo $article->description; ?></textarea>
                    </p>

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
<?php include_once __DIR__ . '/../Layouts/footer.php'; ?>
