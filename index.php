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
				    ?>
                    <li>
                        <a href='<?php the_permalink();?>'>
                            <?php the_title(); ?>
                        </a>
                        <div>
	                        <?php the_excerpt()?>
	                        <?php the_tags( '<p>',' ', '</p>' ); ?>
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
