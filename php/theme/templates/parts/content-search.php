<?php 
    /**
     * php/theme/templates/parts/content-search.php
     * @package scottshealy
     * @author Scott Shealy
     * @version 1.0.0
     * @copyright 2022
    **/
?>

<!-- CONTENT-SEARCH -->
<article id="search-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_content(); ?>
</article>