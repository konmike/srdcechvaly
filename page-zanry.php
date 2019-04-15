<?php get_header(); ?>

	<section id="genre">
		<header>
			<?php get_search_form(); ?>
			<a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
			<a href="#" class="active-link">Žánry</a>
		</header>

		<article>
			<?php the_title('<h1>', '</h1>'); ?>

			<ul class="tags">
			<?
			$posttags = get_tags();
			if ($posttags) {

				foreach ( $posttags as $tag ) {
					$descrip = tag_description($tag->term_id);
					echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'">' . $tag->name . '</a></li>';
				}
			}

			?>
			</ul>
		</article>
	</section>

<?php get_footer(); ?>