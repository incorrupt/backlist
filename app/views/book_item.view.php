

<?php require 'header.php'; ?>

    <h2 class="ui dividing header"><?= $book->title; ?></h2>
    
    <ul>
    	<li><?= $book->title; ?></li>
    	<li><label>Author: </label>
	    	<?php if (count($authors)>0) { ?><br>
	    		<?php foreach ($authors as $key => $author) { ?>
                    <a href="/authors/show/<?=$author->id;?>"><span class="ui green label"><?=$author->name;?></span></a>
	    	<?php } } ?>
    	</li>

        <li><label>Genre: </label>
            <?php if (count($genres)>0) { ?><br>
                <?php foreach ($genres as $key => $genre) { ?>
                    <a href="/genres/show/<?=$genre->id;?>"><span class="ui teal label"><?=$genre->name;?></span></a>
            <?php } } ?>
        </li>
  	</ul>

<?php require 'footer.php'; ?>