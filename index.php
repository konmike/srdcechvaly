<?php get_header(); ?>

	<div class="section">

		<div id="header">
			<div id="left">
				<a href="#bepatient">Sdílej&nbsp;Boha</a>
				<a href="#bepatient">Sdílej&nbsp;Bibli</a>
			</div>
			<div id="right">
				<h1 class="uvodnik">Jsi&nbsp;tu&nbsp;poprvé?</h1>
				<a href="#" id="uvodnik">Úvodník</a>
			</div>
		</div>

		<div id="search-div">
			<?php get_search_form(); ?>
		</div>

		<div id="footer" class="gallery js-flickity"
  data-flickity-options='{ "wrapAround": true, "autoPlay": 5000, "pageDots": false, 
  "cellSelector": ".gallery-cell", "groupCells": true, "cellAlign": "center", "percentPosition": false }'>
			
				<?php
					$posts = get_posts(['numberposts' => '4']);
				?>
					<?php if ($posts) { ?>
				    		<?php foreach ($posts as $post) { ?>
				        	<?php 
				        		setup_postdata($post); 
				        		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'post-thumbnail');
				        	?>
				        	<div class="gallery-cell">
				        		<a href='<?php the_permalink();?>'>
					        		<div class="new-post" style="background-image: url(
					        		<?php echo $featured_img_url; ?>
					        		)">
					        			<div class="title">
					        				<span><?php the_title(); ?></span>
					        			</div>
									</div>
					        	</a>
				        	</div>			        	
				    		<?php } ?>
							<div class="gallery-cell gallery-cell-link">
								<a href="http://www.musicforyou.cekuj.net/category/cesko-slovensti-interpreti/">
									<span>Česko-slovenští interpreti</span>
								</a>
							</div>
							<div class="gallery-cell gallery-cell-link">
								<a href="http://www.musicforyou.cekuj.net/category/zahranicni-interpreti/">
									<span>Zahraniční interpreti</span>
								</a>
							</div>
							<div class="gallery-cell gallery-cell-link">
								<a href="http://www.musicforyou.cekuj.net/category/zanry/">
									<span>Žánry</span>
								</a>
							</div>
				    		<div class="gallery-cell gallery-cell-link">
				    			<a href="https://1url.cz/@VsechnyTitulky" target="_blank" class="targetBlank">
				    				<span>Titulky</span>
				    			</a>
				    		</div>
					<?php } ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

		<div id="video-container">
			<div id="color-overlay"></div>
			<video id="video" poster="http://musicforyou.cekuj.net/wp-content/uploads/2018/09/fbUvodniFotka.jpg" >
				<source src="http://musicforyou.cekuj.net/wp-content/uploads/2018/08/David-Bowden-I-Believe-in-Jesus.mp4" type="video/mp4"> 
			</video>

			<div id="video-controls">
				<button type="button" id="cross"></button>
			    <button type="button" id="play-pause"></button>
			    <button type="button" id="mute"></button>
		  	</div>

		</div>
	</div>

	<div class="section" style="background-image: none">
		<h1 id="bepatient">Připravujeme</h1>
	</div>
		
	
<?php get_footer(); ?>
