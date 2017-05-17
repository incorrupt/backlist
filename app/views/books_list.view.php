

<?php require 'header.php'; ?>

    <h3>Books list.</h3>
    
    <ul>
    <?php foreach ($books as $book) { ?>
    	<li><?= $book->title; ?></li>
    <?php } ?>
  	</ul>

<?php require 'footer.php'; ?>