<?php

function dd($input, $die=true)
{
    echo "<pre>"; 
    var_dump($input);
    echo "</pre>";
    if ($die) { die(); }
}

?>