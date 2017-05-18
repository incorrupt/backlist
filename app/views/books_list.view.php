
<?php require 'header.php'; ?>

   
    <h2 class="ui dividing header">Список книг</h2>
    
    <ul>
	    <?php foreach ($books as $book) { ?>
	    	<li><a href="/books/show/<?=$book->id;?>"><?=$book->title;?></a></li>
	    <?php } ?>
  	</ul>


<?php require 'footer.php'; ?>