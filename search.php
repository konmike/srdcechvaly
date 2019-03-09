<?php get_header(); ?>
<div id="content">
		<div id="search-div">
			<!-- <img id="logo" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/logo-ram.png" /> -->
			<?php get_search_form(); ?>
		</div>

        <?php if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('loop', 'single'); ?>
	   	<?php endwhile; ?>
        <?php endif; ?>

</div>
<?php get_footer(); ?>