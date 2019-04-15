<?php get_header(); ?>
<section id="category">
		<header>
			<?php get_search_form(); ?>
            <a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
            <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
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
                        echo the_title('<h4>', '</h4>') . '</a>';
                        echo '</li>';
                }
                echo '</ul>';
        ?>
        </article>

</section>
<?php get_footer(); ?>