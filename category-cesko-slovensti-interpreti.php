<?php get_header(); ?>
<div id="content">
		<div id="search-div">
			<?php get_search_form(); ?>
		</div>

        <?php

        $thiscat = get_category( get_query_var( 'cat' ) );
        $catid = $thiscat->cat_ID;

		$children_categories = get_categories(
                array('parent' => $catid)
        );

        
        echo '<ul>';
        foreach ($children_categories as $child) {
        	echo '<a href="' . get_category_link( $child->term_id ) . '">';
        	echo '<li>' . $child->cat_name . '</li>';
        	echo '</a>';
        }
        echo '</ul>';

        ?>

</div>
<?php get_footer(); ?>