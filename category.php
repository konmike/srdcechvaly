<?php get_header(); ?>
<section id="category">
		<header>
			<?php get_search_form(); ?>
            <a href="http://musicforyou.cekuj.net/">Domů</a>
            <a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
            <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
            <a href="#" id="open-contact-form">Napiš mi</a>
		</header>

        <article>
        <?php
                $category = get_category( get_query_var( 'cat' ) );
                $posts = get_posts([
                        'numberposts' => '-1',
                        'category' => $category->term_id,
                        'orderby' => 'title',
                        'order' => "ASC",
                ]);

                echo '<h1>' . $category->name . '</h1>';
                echo '<ul>';
                foreach ($posts as $post) {
                        echo '<li><a href="' . get_the_permalink() . '">';
                        echo the_title() . '</a>';
                        echo '</li>';
                }
                echo '</ul>';
        ?>
        </article>

    <aside class="animated fadeInRight" id="contact-form">
        <span id="close-contact-form">Zavřít</span>
		<?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
    </aside>


</section>
<?php get_footer(); ?>