
<?php require 'header.php'; ?>


    <h2 class="ui dividing header"> Авторы </h2>
    

    <ul>
	    <?php foreach ($authors as $author) { ?>
	    	<li><a href="/authors/show/<?=$author->id;?>"><?=$author->name;?></a></li>
	    <?php } ?>
  	</ul>


<?php require 'footer.php'; ?>