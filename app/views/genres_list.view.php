
<?php require 'header.php'; ?>

    <h2 class="ui dividing header">Категории</h2>
    
    <ul>
	    <?php foreach ($genres as $genre) { ?>
	    	<li><a href="/genres/show/<?=$genre->id;?>"><?=$genre->name;?></a></li>
	    <?php } ?>
  	</ul>

<?php require 'footer.php'; ?>