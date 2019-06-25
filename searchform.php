<form role="search" method="get" class="form-search" id="searchform" action="<?php bloginfo('url'); ?>">
        <input type="text" value="<?php the_search_query(); ?>"
               name="s"
               autocomplete="off"
               id="s"
               class="form-search__query"
               placeholder="např. hillsong"
               autofocus="autofocus"/>
        <input type="submit" id="searchsubmit" class="form-search__submit" value="" />
</form>