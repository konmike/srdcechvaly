<?php get_header(); ?>
<main>
    <section id="single" class="section section--single">
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
                <article class="article article--detail">
                <h1 class="article__title">
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
                <footer class="footer footer--article-detail">
                    <ul class="list list--article-detail">
                    <?php

                        foreach ($categories as $cat) {
                            $parentName = get_cat_name($cat->parent);
                            echo '<li><a class="list__link" href="'.get_category_link( $cat->cat_ID ).'" title="Další titulky od '.$cat->name.'">'.$cat->name.'</a></li>';
                        }
                    ?>
                    </ul>
                    <ul class="list list--article-detail">
                        <?php
                        $posttags = get_the_tags();
                        if ($posttags) {

                            foreach ( $posttags as $tag ) {
                                $descrip = tag_description($tag->term_id);
                                if($descrip)
                                    echo '<li><a class="list__link" href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'">' . $tag->name . '</a></li>';
                                else
                                    echo '<li><a class="list__link" href="' . get_tag_link( $tag->term_id ) . '" title="Žánr">' . $tag->name . '</a></li>';
                            }
                        }

                        ?>
                    </ul>

                </footer>

                </article>

                <?php } ?>

                <aside class="aside aside--contact-form animated fadeInRight" id="contact-form">
                    <span id="close-contact-form" class="aside__close-contact-form">Zavřít</span>
                    <?php echo do_shortcode( '[contact-form-7 id="681" title="Vzkaz"]' ); ?>
                </aside>
            <?php wp_reset_postdata(); ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>