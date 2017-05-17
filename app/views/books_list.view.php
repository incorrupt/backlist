<?php require 'header.php'; ?>

    <h3>Books list.</h3>
    
    <ul>
    <?php foreach ($books as $book) { ?>
    	<li><a href="/books/show/<?=$book->id;?>"><?=$book->title;?></a></li>
    <?php } ?>
  	</ul>

<?php require 'footer.php'; ?>