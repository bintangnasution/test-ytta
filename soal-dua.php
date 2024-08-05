<?php
$bilangan = $_POST["bil"];

if ($bilangan) {
    for ($i=1; $i < $bilangan+1; $i++) { 
        if ($bilangan % 2 == 0) {
            echo "genap";
            exit;
        }else {
            echo "ganjil";
            exit;
        }
        
    }
}

?>