<?php
    require dirname(__FILE__,2) . "\/vendor\/autoload.php";

    $dojah = new DojahCore\Dojah();

    try
    {
        $result = $dojah->general()->getDir();

        // echo var_dump($_ENV);
        echo $result;
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
    