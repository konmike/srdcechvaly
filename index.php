<?php get_header(); ?>

<main>
    <article>
        <header>
            <h1 class="uvodnik">Jsi&nbsp;tu&nbsp;poprvé?</h1>
            <a href="#" id="uvodnik">Úvodník</a>
        </header>

        <aside>
		    <?php
		    $posts = get_posts(['numberposts' => '5']);
		    ?>
            <ul>
                <li id="last-subtitles" class="close-last-subtitles">Nejnovější titulky</li>
		    <?php if ($posts) { ?>
			    <?php foreach ($posts as $post) { ?>
				    <?php
				    setup_postdata($post);
				    $posttags = get_the_tags();
				    ?>
                    <li>
                        <a href='<?php the_permalink();?>'>
                            <?php the_title(); ?>
                        </a>
                        <div>
	                        <?php the_excerpt()?>
                            <?php
                                if ($posttags) {

	                                foreach ( $posttags as $tag ) {
                                        $descrip = tag_description($tag->term_id);
		                                echo '<p><a href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'">' . $tag->name . '</a></p>';
	                                }
                                }

                            ?>
                        </div>
                    </li>

			    <?php } ?>
		    <?php } ?>
            </ul>
		    <?php wp_reset_postdata(); ?>

        </aside>
    </article>

    <article>
	    <?php get_search_form(); ?>
    </article>
</main>

	
<?php get_footer(); ?>
