<?php get_header(); ?>
<main>
    <section id="search-result" class="section section--search-result">
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

        <?php if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('loop', 'single'); ?>
	   	<?php endwhile; ?>
        <?php endif; ?>

        <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
            <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
		    <?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
        </aside>

    </section>
</main>
<?php get_footer(); ?>