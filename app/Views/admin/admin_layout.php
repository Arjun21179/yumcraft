<?php 


include 'admin_header.php';


if(isset($content))
{
    echo view($content);
}


include 'admin_footer.php';


?>