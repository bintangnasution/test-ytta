<?php
$bilangan = $_POST["bil"];

if ($bilangan) {
    for ($i=1; $i < $bilangan+1; $i++) { 
        echo ''.$i.',';
    }
}

?>