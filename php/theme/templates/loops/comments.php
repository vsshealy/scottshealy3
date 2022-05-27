<?php 
    /**
     * php/theme/templates/loops/comments.php
     * @package scottshealy
     * @author Scott Shealy
     * @version 1.0.0
     * @copyright 2022
    **/
?>

<!-- LOOP | COMMENTS -->
<?php 
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;
?>