<?php get_header(); ?>
<main>
    <section id="home" class="section section--home-page">
        <header class="header header--home-page">
            <nav>
                <ul class="nav nav--home-page">
                    <li class="nav__item  nav__item--comment">
                        <a href="#uvodnik" class="tlacitko nav__link nav__link--home-page">Úvodník</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__link--home-page" href="#" id="open-contact-form">Napiš mi</a>
                    </li>
                </ul>
            </nav>
        </header>

        <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
            <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
	        <?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>

        <aside class="aside aside--last-articles">
		    <?php
		    $posts = get_posts(['numberposts' => '5']);
		    ?>
            <ul class="list list--home-page">
                <li id="last-subtitles" class="list__item aside__close-last-subtitles">Nejnovější titulky</li>
		    <?php if ($posts) { ?>
			    <?php foreach ($posts as $post) { ?>
				    <?php
				    setup_postdata($post);
				    $posttags = get_the_tags();
				    ?>
                    <li class="list__item">
                        <a href='<?php the_permalink();?>' class="list__link list__link--home-page-title">
                            <?php the_title(); ?>
                        </a>
                        <div class="list__excerpt">
	                        <?php the_excerpt()?>
                            <?php
                                if ($posttags) {
	                                foreach ( $posttags as $tag ) {
                                        $descrip = tag_description($tag->term_id);
		                                echo '<p><a href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'" class="list__link list__link--home-page-tag">' . $tag->name . '</a></p>';
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

        <footer class="footer footer--home-page">
	        <?php get_search_form(); ?>
        </footer>
    </section>

    <section id="uvodnik" class="section section--editorial">
        <article class="article article--editorial">
            <p>"Túžim sa vrátiť do srdca chvály<br>
                kde si jedine Ty, jedine Ty Ježiš" <br>
                <span class="article__citation">(Richard Čanaky, Hudba dohrává)</span></p>
            <p>
                Tento web slouží jako prodloužená ruka mého Youtube kanálu.<br>
                Můžete si zde snadno najít titulky ke své oblíbené písni,<br>
                stejně tak zde v přehledné podobě najdete seznam všech doposud<br>
                vytvořených titulků dle jednotlivých <a href="http://srdcechvaly.cekuj.net/interpreti" class="article__link article__link--editorial" title="Interpreti">interpretů</a> či <a href="http://srdcechvaly.cekuj.net/zanry" class="article__link article__link--editorial" title="Žánry">žánrů</a>.
            </p>
        </article>
        <footer class="footer footer--editorial">
            <div class="footer__wrap-link">
                <a href="https://www.youtube.com/c/srdcechvaly" class="footer__link" title="Youtube - Srdce chvály">
                    <img src="http://srdcechvaly.cekuj.net/wp-content/uploads/2019/04/channel.png" class="footer__img" alt="Youtube">
                    <h3 class="footer__title">Youtube kanál</h3>
                </a>
            </div>
            <div class="footer__wrap-link">
                <a href="https://1drv.ms/f/s!AlC2uXdxwQQAhzi3uv_ykp9he49I" class="footer__link" title="Titulky ke stažení">
                    <img src="http://srdcechvaly.cekuj.net/wp-content/uploads/2019/04/subtitle.png" class="footer__img" alt="Titulky">
                    <h3 class="footer__title">Titulky</h3>
                </a>
            </div>
            <a href="#home" id="up" class="button-up tlacitko"></a>
        </footer>
    </section>
</main>

	
<?php get_footer(); ?>
