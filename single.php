<?php
 
  //response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div id='success'>{$message}</div>";
    else $response = "<div id='error'>{$message}</div>";
 
  }

  //response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Vyplňte prosím všechny povinné položky.";
//$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Zpráva bohužel nebyla odeslána. Zkuste to prosím znovu.";
$message_sent    = "Díky za upozornění, podívám se na to.";
 
//user posted variables
$name = $_POST['message_name'];
$title = $_POST['message_title'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];
 
//php mailer variables
$to = get_option('admin_email');
$subject = "Nedostupné video na webu!";
$headers = "";

if(!$human == 0){
	if($human != 2) 
		my_contact_form_generate_response("error", $not_human);
	else {
		if(empty($name) || empty($title) ){
		  my_contact_form_generate_response("error", $missing_content);
		}
		else //ready to go!
		{
		  $sent = wp_mail($to, $subject, strip_tags($message), $title);
		  if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
		  else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
		}
	}
}
else 
	if ($_POST['submitted']) 
		my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header(); ?>
<div id="content">
	<div id="search-div-single">
		<?php get_search_form(); ?>
	</div>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

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
			<div class="footer_post">
				<ul>
				<?php 
					
					foreach ($categories as $cat) {
						//echo "(" . $cat->cat_ID . ")";
						$parentName = get_cat_name($cat->parent);
						if($parentName != "Žánry")
							echo '<li><a href="'.get_category_link( $cat->cat_ID ).'">'.$cat->name.'</a></li>';
					}
				?>
				</ul>

				<span class="alert">
				<h2>Nedostupné video?</h2>
				<span id="alert_button">Pošli mi upozornění</span>
				</span>

			</div>

			<div class="other_videos">
		    		<?php 
		    			echo '<h3>' . $categories[1]->name . '</h3>';
		    			foreach ($posts as $post) { 
		    		?>
		        	<?php 
		        		setup_postdata($post); 
		        	?>

				<div class="post">
			        	<a href="<?php the_permalink(); ?>">
							<div class="button-overlay">
								<?php the_post_thumbnail(); ?>
							</div>
							<h3>
								<?php the_title(); ?>
							</h3>
							<h4>
								<?php the_excerpt(); ?>
							</h4>
						</a>
				</div>
		    		<?php } ?>
		    </div>
			<?php } ?>

<div id="info_form">
 
<div id="respond">
  
  <form action="<?php the_permalink(); ?>" method="post">
    <p>
    	<label for="name">Jméno: <span>*</span> <br>
    		<input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
    	</label>
    </p>
    <p>
    	<label for="message_title">Název videa: <span>*</span> <br>
    		<input type="text" name="message_title" value="<?php echo wp_title(); ?>">
    	</label>
    </p>
    <p>
    	<label for="message_text">Message: <br>
    		<textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?>
    		</textarea>
    	</label>
    </p>
    <p>
    	<label for="message_human">Human Verification: <span>*</span> <br>
    		<input type="text" style="width: 60px;" name="message_human">
    		+ 3 = 5
    	</label>
    </p>
    
    <input type="hidden" name="submitted" value="1">
    <p><input type="submit"></p>
    <p><span id="close_button">Zrušit</span></p>
  </form>
</div>
</div>

<?php echo $response; ?>

		<?php wp_reset_postdata(); ?>

		<?php endwhile; ?>
	<?php endif; ?>
</div>               
	
<?php get_footer(); ?>