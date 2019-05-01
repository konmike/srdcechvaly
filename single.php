<?php get_header(); ?>
<section id="single">
	<header>
		<?php get_search_form(); ?>
        <a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
        <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
    </header>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article>
            <h1>
                <?php the_title(); ?>
            </h1>

			<?php 
				the_content();
			?>

			<?php
				function sortCategories($categories) { // Sorting the category
					    usort($categories, "cmpCategories");
					    return $categories;
				}

				function cmpCategories($category_1,$category_2) { // Sort function
				    
			        if ($category_1->cat_ID == $category_2->cat_ID) {
				        return 0;
				    } else {
				        return ($category_1->cat_ID < $category_2->cat_ID) ? -1 : 1;
				    }
				}
				
				// get categories of post in sorted order
				$categories = sortCategories(get_the_category());     

				$posts = get_posts(['category' => $categories[1]->term_id,
									'numberposts' => '-1']);
			?>
			<?php if ($posts) { ?>
			<footer>
				<ul>
				<?php 
					
					foreach ($categories as $cat) {
						$parentName = get_cat_name($cat->parent);
						echo '<li><a href="'.get_category_link( $cat->cat_ID ).'" title="Další titulky od '.$cat->name.'">'.$cat->name.'</a></li>';
					}
				?>
				</ul>
                <ul>
	                <?php
	                $posttags = get_the_tags();
	                if ($posttags) {

		                foreach ( $posttags as $tag ) {
			                $descrip = tag_description($tag->term_id);
			                if($descrip)
			                    echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'">' . $tag->name . '</a></li>';
			                else
				                echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="Žánr">' . $tag->name . '</a></li>';
		                }
	                }

	                ?>
                </ul>

			</footer>

            </article>

			<?php } ?>

        <footer id="contact-form">
	        <?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </footer>



		<?php wp_reset_postdata(); ?>

		<?php endwhile; ?>
	<?php endif; ?>
</section>
	
<?php get_footer(); ?>