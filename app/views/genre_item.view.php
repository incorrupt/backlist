
<?php require 'header.php'; ?>


    <h2 class="ui dividing header"><?= $genre->name; ?></h2>
  
  
    <ul>
    	<li><?= $genre->name; ?></li>
    	<li><label>Books: </label>
	    	<?php if (count($books)>0) { ?><br>
	    		<?php foreach ($books as $key => $book) { ?>
                    <a href="/books/show/<?=$book->id;?>"><?=$book->title;?></a><br>
	    	<?php } } ?>
    	</li>

  	</ul>
 



<?php require 'footer.php'; ?>