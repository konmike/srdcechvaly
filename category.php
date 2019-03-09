<?php get_header(); ?>
<div id="content">
		<div id="search-div">
			<!-- <img id="logo" src="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/logo-ram.png" /> -->
			<?php get_search_form(); ?>
		</div>

        <?php
                $category = get_category( get_query_var( 'cat' ) );
                $posts = get_posts([
                        'category' => $category->term_id,
                        'numberposts' => '-1'
                ]);

                echo '<h3>' . $category->name . '</h3>';
                echo '<ul>';
                foreach ($posts as $post) {
                        echo '<a href="' . get_the_permalink() . '">';
                        echo '<li>' . the_title() . '</li>';
                        echo '</a>';
                }
                echo '</ul>';
        ?>

</div>
<?php get_footer(); ?>