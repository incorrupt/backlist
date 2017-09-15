

<?php require 'header.php'; ?>

    <p>Hello world! This is HTML5 Boilerplate.</p>
    
    <ul>
    <?php foreach ($books as $book) { ?>
    	<li><?= $book->title; ?></li>
    <?php } ?>
  	</ul>

<?php require 'footer.php'; ?>