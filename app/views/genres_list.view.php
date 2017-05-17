<?php require 'header.php'; ?>

    <h3>Genre list.</h3>
    
    <ul>
    <?php foreach ($genres as $genre) { ?>
    	<li><a href="/genres/show/<?=$genre->id;?>"><?=$genre->name;?></a></li>
    <?php } ?>
  	</ul>

<?php require 'footer.php'; ?>