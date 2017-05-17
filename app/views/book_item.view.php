

<?php require 'header.php'; ?>

    <h3>Book item.</h3>
    
    <ul>
    	<li><?= $book->title; ?></li>
    	<li><label>Author: </label>
	    	<?php if (count($authors)>0) { ?><br>
	    		<?php foreach ($authors as $key => $author) { ?>
                    <a href="/authors/show/<?=$author->id;?>"><?=$author->name;?></a><br>
	    	<?php } } ?>
    	</li>

        <li><label>Genre: </label>
            <?php if (count($genres)>0) { ?><br>
                <?php foreach ($genres as $key => $genre) { ?>
                    <a href="/genres/show/<?=$genre->id;?>"><?=$genre->name;?></a><br>
            <?php } } ?>
        </li>
  	</ul>

<?php require 'footer.php'; ?>