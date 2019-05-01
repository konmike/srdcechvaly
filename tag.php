<?php get_header(); ?>
	<section id="tag">
		<header>
			<?php get_search_form(); ?>
            <a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
            <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
		</header>

		<article>
			<?php
			$posttags = get_the_tags();
			if ($posttags) {

				foreach ( $posttags as $tag ) {
					$descrip = tag_description($tag->term_id);
					echo '<h1>' . $tag->name . '</h1>';
					if($descrip){
						echo $descrip;
					}
				}
			}

			?>

			<ul>
			<?php
				while (have_posts()) : the_post();
			?>
				<li><a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
				</a></li>
			<?php endwhile;?>
			</ul>
		</article>

	</section>
<?php get_footer(); ?>