<?php
    require dirname(__FILE__,2) . "\/vendor\/autoload.php";

    // Initialize the Dojah Class with all available classes
    // make sure .env is available in the root directory else
    // an exception will be thrown. The results are already in json format

    $dojah = new DojahCore\Dojah();
    

    // get all available banks
    try{
        $banks = $dojah->general()->banks();
        echo $banks;
    }catch(Exception $e) {
        // catch any exception that may arise
        echo $e->getMessage();
    }

    // get the balance
    try{
        $balance = $dojah->general()->my_dojah_balance();

        echo $balance;
    }catch(Exception $e) {
        echo $e->getMessage();
    }

    // resolve card_bin
    try{
        $bin_details =  $dojah->general()->resolve_card_bin("426118");
    
        echo $bin_details;
    }catch(Exception $e){
        echo $e->getMessage();
    }

    try{
        $nunban_details =  $dojah->general()->resolve_nuban('0444074143','063');
    
        echo $nunban_details;
    }catch(Exception $e){
        echo $e->getMessage();
    }