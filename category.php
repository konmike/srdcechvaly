<?php get_header(); ?>
<section id="category" class="section section--category">
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

    <article class="article article--category">
        <?php
                $category = get_category( get_query_var( 'cat' ) );
                $posts = get_posts([
                        'numberposts' => '-1',
                        'category' => $category->term_id,
                        'orderby' => 'title',
                        'order' => "ASC",
                ]);

                echo '<h1 class="article__title">' . $category->name . '</h1>';
                echo '<ul class="list list--category">';
                foreach ($posts as $post) {
                        echo '<li><a href="' . get_the_permalink() . '" class="list__link">';
                        echo the_title() . '</a>';
                        echo '</li>';
                }
                echo '</ul>';
        ?>
        </article>

    <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
        <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
		<?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
    </aside>
</section>
<?php get_footer(); ?>