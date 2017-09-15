
<?php require 'header.php'; ?>

    <h2 class="ui dividing header">Издатели</h2>
    
    <div class="ui relaxed divided list">
	    <?php foreach ($publishers as $publisher) { ?>

	    	<div class="item">
			    <i class="large hashtag middle aligned icon"></i>
			    <div class="content">
			      <a href="/publishers/show/<?=$publisher->id;?>" class="header">
			      	<?=$publisher->name;?>
			      </a>
			      <div class="description">Издатель</div>
			    </div>
			</div>

	    <?php } ?>
  	</div>


<?php require 'footer.php'; ?>