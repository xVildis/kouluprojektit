<?php
function adminview($method)
{
    if(!islogged())
        return;
    var_dump($method);
}
?>