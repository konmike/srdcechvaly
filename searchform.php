<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" autofocus placeholder="např. hillsong" />
        <input type="submit" id="searchsubmit" value="" />
</form>