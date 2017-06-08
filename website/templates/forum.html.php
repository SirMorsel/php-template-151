<?php
$section_title =  "forum";
ob_start();
 ?>

<h1>Forumsinhalt</h1>

 <?php
 $content = ob_get_contents();
 ob_end_clean();
 ?>
