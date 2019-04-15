<?php
	$category = get_the_category(); // načtení všech rubrik, kam příspěvek patří. 
?>
<article class="post">
	<a href="<?php the_permalink(); ?>">
		<h3>
			<?php the_title(); ?>
		</h3>
	</a>

    <?php the_content(); ?>
</article>