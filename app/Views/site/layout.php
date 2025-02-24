<?php 

include 'header.php';

if(isset($content))
{
    echo view($content);
}

include 'footer.php';

