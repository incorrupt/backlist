

<?php require 'header.php'; ?>

    <h2 class="ui dividing header"><?=$book->title;?></h2>

    <div class="ui two column grid">
        <div class="six wide column">
            <img  class="ui large image" src="/img/<?=$book->id;?>.jpg">
        </div>


        <div class="ten wide column">
            <div class="ui segment">
                <div class="ui relaxed divided list">

                    <div class="item">
                        <div class="content">
                            <div class="description"><?=$book->description;?></div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="content">
                            <div class="description">Год: <?=$book->year;?></div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="content">
                            <div class="description">ISBN: <?=$book->isbn;?></div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="content">
                            <div class="description">Страницы: <?=$book->pages;?></div>
                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="content">
                            <div class="description">Авторы:</div>
                            <?php foreach ($book->getAuthors() as $author) { ?>
                                <a href="/authors/show/<?=$author->id;?>"><span class="ui green label"><?=$author->name;?></span></a>
                            <?php } ?>
                        </div>
                    </div>
        
                    <div class="item">
                        <div class="content">
                            <div class="description">Категории:</div>
                            <?php foreach ($book->getGenres() as $genre) { ?>
                                <a href="/genres/show/<?=$genre->id;?>"><span class="ui teal label"><?=$genre->name;?></span></a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="item">
                        <div class="content">
                            <div class="description">Издатель:</div>
                             <a href="/publishers/show/<?=$book->getPublisher()->id;?>"><span class="ui olive label"><?=$book->getPublisher()->name;?></span></a>
                        </div>
                    </div>

                    <div class="item">
                        <div class="content">
                            <div class="description">Просмотры: <i class="unhide icon"></i><?=$book->looks;?></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>


<?php require 'footer.php'; ?>