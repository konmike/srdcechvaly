<?php
	$category = get_the_category(); // načtení všech rubrik, kam příspěvek patří. 
?>
<article class="article article--search-result">
	<a href="<?php the_permalink(); ?>" class="article__link article__link--search-result">
		<h3>
			<?php the_title(); ?>
		</h3>
	</a>

    <?php the_content(); ?>
</article>