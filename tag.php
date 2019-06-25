<?php get_header(); ?>
<main>
	<section id="tag" class="section section--tag">
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
                        <a class="nav__link" href="http://musicforyou.cekuj.net/zanry">Žánry</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link" href="#" id="open-contact-form">Napiš mi</a>
                    </li>
                </ul>
            </nav>
        </header>

        <article class="article article--tag">
			<?php
			$posttags = get_the_tags();
			if ($posttags) {

				foreach ( $posttags as $tag ) {
					$descrip = tag_description($tag->term_id);
					echo '<h1 class="article__title">' . $tag->name . '</h1>';
					if($descrip){
						echo $descrip;
					}
				}
			}

			?>

			<ul class="list list--tag">
			<?php
				while (have_posts()) : the_post();
			?>
				<li><a href="<?php the_permalink(); ?>" class="list__link">
						<?php the_title(); ?>
				</a></li>
			<?php endwhile;?>
			</ul>
		</article>

        <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
            <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
			<?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>
	</section>
</main>
<?php get_footer(); ?>