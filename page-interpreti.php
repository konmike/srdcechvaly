<?php get_header(); ?>

	<section id="interpret">
		<header>
			<?php get_search_form(); ?>
            <a href="http://musicforyou.cekuj.net/">Domů</a>
            <a href="#" class="active-link">Interpreti</a>
            <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
            <a href="#" id="open-contact-form">Napiš mi</a>
		</header>

		<article>
			<?php the_title('<h1>', '</h1>'); ?>
			<ul class="interpret-list">
			<?php
			$args = array(
			'child_of'            => 0,
			'current_category'    => 0,
			'depth'               => 0,
			'echo'                => 1,
			'exclude'             => '',
			'exclude_tree'        => '',
			'feed'                => '',
			'feed_image'          => '',
			'feed_type'           => '',
			'hide_empty'          => 1,
			'hide_title_if_empty' => false,
			'hierarchical'        => true,
			'order'               => 'ASC',
			'orderby'             => 'name',
			'separator'           => '<br />',
			'show_count'          => 0,
			'show_option_all'     => '',
			'show_option_none'    => __( 'No categories' ),
			'style'               => 'list',
			'taxonomy'            => 'category',
			'title_li'            => '',
			'use_desc_for_title'  => 0,
			);

			wp_list_categories($args);
			?>
			</ul>
		</article>

        <aside class="animated fadeInRight" id="contact-form">
            <span id="close-contact-form">Zavřít</span>
			<?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>

	</section>

<?php get_footer(); ?>