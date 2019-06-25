<?php get_header(); ?>
<main>
	<section id="interpret" class="section section--interpret">
        <header class="header header--search-and-nav">
			<?php get_search_form(); ?>

            <nav>
                <ul class="nav nav--top">
                    <li class="nav__item">
                        <a class="nav__link" href="http://musicforyou.cekuj.net/">Domů</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__link--active" href="#">Interpreti</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="http://musicforyou.cekuj.net/zanry">Žánry</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#" id="open-contact-form">Napiš mi</a>
                    </li>
                </ul>
            </nav>
        </header>

        <article class="article article--interpret">
			<?php the_title('<h1 class="article__title">', '</h1>'); ?>
			<ul class="list list--interpret interpret-list">
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
			'title_li'            => '  ',
			'use_desc_for_title'  => 0,
			);

			wp_list_categories($args);
			?>
			</ul>
		</article>

        <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
            <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
			<?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>

	</section>
</main>
<?php get_footer(); ?>