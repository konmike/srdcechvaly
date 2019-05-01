<?php get_header(); ?>

<main>
    <article id="home">
        <header>
            <ul>
                <li>
                    <a href="#uvodnik" class="tlacitko">Úvodník</a>
                </li>
                <li id="open-contact-form">
                    Napiš mi
                </li>
            </ul>

        </header>

        <aside class="animated fadeInRight" id="contact-form">
            <span id="close-contact-form">Zavřít</span>
	        <?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>

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

        <footer>
	        <?php get_search_form(); ?>
        </footer>
    </article>

    <article id="uvodnik">
        <div>
            <p>"Túžim sa vrátiť do srdca chvály<br>
                kde si jedine Ty, jedine Ty Ježiš" <br>
                <span>(Richard Čanaky, Hudba dohrává)</span></p>
            <p>
                Tento web slouží jako prodloužená ruka mého Youtube kanálu.<br>
                Můžete si zde snadno najít titulky ke své oblíbené písni,<br>
                stejně tak zde v přehledné podobě najdete seznam všech doposud<br>
                vytvořených titulků dle jednotlivých <a href="http://srdcechvaly.cekuj.net/interpreti" title="Interpreti">interpretů</a> či <a href="http://srdcechvaly.cekuj.net/zanry" title="Žánry">žánrů</a>.
            </p>
        </div>
        <footer>
            <div>
                <a href="https://www.youtube.com/c/srdcechvaly" title="Youtube - Srdce chvály">
                    <img src="http://srdcechvaly.cekuj.net/wp-content/uploads/2019/04/channel.png" alt="Youtube">
                    <h3>Youtube kanál</h3>
                </a>
            </div>
            <div>
                <a href="https://1drv.ms/f/s!AlC2uXdxwQQAhzi3uv_ykp9he49I" title="Titulky ke stažení">
                    <img src="http://srdcechvaly.cekuj.net/wp-content/uploads/2019/04/subtitle.png" alt="Titulky">
                    <h3>Titulky</h3>
                </a>
            </div>
            <a href="#home" id="up" class="tlacitko"></a>
        </footer>
    </article>
</main>

	
<?php get_footer(); ?>
