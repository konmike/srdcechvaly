<?php get_header(); ?>

    <section id="search-result">
		<header>
			<?php get_search_form(); ?>
            <a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
            <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
		</header>

        <?php if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('loop', 'single'); ?>
	   	<?php endwhile; ?>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>