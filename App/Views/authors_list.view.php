
<?php require 'header.php'; ?>


    <h2 class="ui dividing header"> Авторы </h2>
    

    <div class="ui relaxed divided list">
	    <?php foreach ($authors as $author) { ?>

			<div class="item">
			    <i class="large write middle aligned icon"></i>
			    <div class="content">
			    	<a href="/authors/show/<?=$author->id;?>"class="header">
			      		<?=$author->name;?>
			      	</a>
			    	<div class="description">Автор</div>
			    </div>
			</div>
	    	
	    <?php } ?>
  	</div>


<?php require 'footer.php'; ?>
