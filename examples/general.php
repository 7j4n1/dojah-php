<?php
    require dirname(__FILE__,2) . "\/vendor\/autoload.php";

    $dojah = new DojahCore\Dojah();

    try
    {
        // $result = $dojah->general()->banks();

        // echo var_dump($_ENV);
        // echo $result;
        echo $dojah->general()->my_dojah_balance();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
    