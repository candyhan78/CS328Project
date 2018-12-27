<?php
function destroy_and_exit($complaint)
{
    ?>
    <p> CANNOT CONTINUE: <?= $complaint ?> 
    </p>
    <p> <a href="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        Try again </a> </p>
    <?php
  
    session_destroy();
    exit;
}
   