

<?php require 'header.php'; ?>

    <h3>Books list.</h3>
    
    <ul>
    	<li><?= $book->title; ?></li>
    	<li>
	    	<?php if (count($authors)>0) { ?>
	    		<?php foreach ($authors as $key => $auhor) { ?>
	    			<?= $auhor->name; ?>
	    	<?php } } ?>
    	</li>
  	</ul>

<?php require 'footer.php'; ?>