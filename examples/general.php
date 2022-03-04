<?php
    require dirname(__FILE__,2) . "\/vendor\/autoload.php";

    $dojah = new DojahCore\Dojah();

    try
    {
        $result = $dojah->general()->banks();
        echo $result;
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
    