
<?php require 'header.php'; ?>

    <h2 class="ui dividing header">Категории</h2>
    
    <div class="ui relaxed divided list">
	    <?php foreach ($genres as $genre) { ?>

	    	<div class="item">
			    <i class="large hashtag middle aligned icon"></i>
			    <div class="content">
			      <a href="/genres/show/<?=$genre->id;?>" class="header">
			      	<?=$genre->name;?>
			      </a>
			      <div class="description">Категория</div>
			    </div>
			</div>

	    <?php } ?>
  	</div>


<?php require 'footer.php'; ?>