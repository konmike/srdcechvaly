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
<section id="single">
	<header>
		<?php get_search_form(); ?>
        <a href="http://musicforyou.cekuj.net/interpreti">Interpreti</a>
        <a href="http://musicforyou.cekuj.net/zanry">Žánry</a>
    </header>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article>
            <h1>
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
			<footer>
				<ul>
				<?php 
					
					foreach ($categories as $cat) {
						$parentName = get_cat_name($cat->parent);
						echo '<li><a href="'.get_category_link( $cat->cat_ID ).'" title="Další titulky">'.$cat->name.'</a></li>';
					}
				?>
				</ul>
                <ul>
	                <?php
	                $posttags = get_the_tags();
	                if ($posttags) {

		                foreach ( $posttags as $tag ) {
			                $descrip = tag_description($tag->term_id);
			                echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="'. strip_tags($descrip) .'">' . $tag->name . '</a></li>';
		                }
	                }

	                ?>
                </ul>

			</footer>

				<?php echo $response; ?>

            </article>

			<?php } ?>

        <span id="span-aside-form">Nechte mi vzkaz</span>

        <aside id="aside-form">

          <h3>Váš vzkaz</h3>
            <p>Našli jste nějakou chybu? Nefunkční odkaz, ?</p>

          <form action="<?php the_permalink(); ?>" method="post" id="message-form">
            <p>
                <label for="name">Vaše jméno: <span>*</span> <br>
                    <input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                </label>
            </p>
            <p>
                <label for="message_title">Název článku: <span>*</span> <br>
                    <input type="text" name="message_title" value="<?php echo wp_title(); ?>">
                </label>
            </p>
            <p>
                <label for="message_text">Zpráva: <br>
                    <textarea name="message_text"><?php echo esc_textarea($_POST['message_text']); ?>
                    </textarea>
                </label>
            </p>
            <p>
                <label for="message_human">Ochrana proti SPAMu: <span>*</span> <br>
                    <input type="text" style="width: 60px;" name="message_human">
                    + 3 = 5
                </label>
            </p>

            <input type="hidden" name="submitted" value="1">
            <p><input type="submit"></p>
          </form>

        </aside>



		<?php wp_reset_postdata(); ?>

		<?php endwhile; ?>
	<?php endif; ?>
</section>
	
<?php get_footer(); ?>