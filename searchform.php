<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
        <input type="text" value="<?php the_search_query(); ?>"
               name="s"
               autocomplete="off"
               id="s"
               placeholder="např. hillsong"
               autofocus="autofocus"/>
        <input type="submit" id="searchsubmit" value="" />
</form>