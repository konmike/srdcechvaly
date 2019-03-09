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

                $child_catid = $child->cat_ID;
                echo $child_catid;
                $ch_ch_categories = get_categories(
                        array('parent' => $child_catid)
                );

                if(! empty($ch_ch_categories)){
                        echo '<ul>';
                        foreach ($ch__ch_categories as $ch_ch) {
                                echo '<a href="' . get_category_link( $ch_ch->term_id ) . '">';
                                echo '<li>' . $ch_ch->cat_name . '</li>';
                                echo '</a>';
                        }
                        echo '</ul>';
                }        
        }
        echo '</ul>';

        ?>

</div>
<?php get_footer(); ?>