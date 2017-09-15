
<?php require 'header.php'; ?>

    <h2 class="ui dividing header">Поиск: <?=$search_str;?> </h2>


	<div class="ui relaxed divided list">
	    <?php if (count($books)>0) { foreach ($books as $book) { ?>

	    	<div class="item">
			    <i class="large book middle aligned icon"></i>
			    <div class="content">
			      <a href="/books/show/<?=$book->id;?>" class="header">
			      	<?=$book->title;?>
			      </a>
			      <div class="description">Книга</div>
			    </div>
			</div>

	    <?php } } ?>
  	</div>




<?php require 'footer.php'; ?>