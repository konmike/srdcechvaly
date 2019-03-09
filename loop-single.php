<?php
	$category = get_the_category(); // načtení všech rubrik, kam příspěvek patří. 
?>
<div class="post">
	<a href="<?php the_permalink(); ?>">
		<div class="button-overlay">
			<?php the_post_thumbnail(); ?>
		</div>
		<h3>
			<?php the_title(); ?>
		</h3>
		<h4>
			<?php the_excerpt(); ?>
		</h4>
	</a>

</div>


<!-- 
	<?php if($category[0]){
	echo $category[0]->cat_name; ?> - <?php the_title();
	}else{ 
		the_title(); 
	} ?>
-->