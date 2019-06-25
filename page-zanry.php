<?php get_header(); ?>
<main>
	<section id="genre" class="section section--genre">
        <header class="header header--search-and-nav">
			<?php get_search_form(); ?>

            <nav>
                <ul class="nav nav--top">
                    <li class="nav__item">
                        <a class="nav__link" href="http://musicforyou.cekuj.net/">Domů</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link nav__link--active" href="#">Žánry</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#" id="open-contact-form">Napiš mi</a>
                    </li>
                </ul>
            </nav>
        </header>

		<article class="article article--genre">
			<?php the_title('<h1 class="article__title">', '</h1>'); ?>

			<ul class="list list--genre tags">
			<?
			$posttags = get_tags();
			if ($posttags) {

				foreach ( $posttags as $tag ) {
					$descrip = tag_description($tag->term_id);
					echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'" class="list__link">' . $tag->name . '</a></li>';
				}
			}

			?>
			</ul>
		</article>

        <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
            <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
			<?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>
	</section>
</main>
<?php get_footer(); ?>