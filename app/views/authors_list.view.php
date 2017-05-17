
<?php require 'header.php'; ?>

    <h3>Authors list.</h3>
    
    <ul>
    <?php foreach ($authors as $author) { ?>
    	<li><a href="/authors/show/<?=$author->id;?>"><?=$author->name;?></a></li>
    <?php } ?>
  	</ul>

<?php require 'footer.php'; ?>