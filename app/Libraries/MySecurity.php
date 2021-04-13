<?php

namespace App\Libraries;

class MySecurity{ 
    
    public function isSecure($code){
        $s = base64_decode($code);
        
        $start_date = new \DateTime($s);
        $since_start = $start_date->diff(new \DateTime());
        // echo $since_start->days.' days total<br>';
        // echo $since_start->y.' years<br>';
        // echo $since_start->m.' months<br>';
        // echo $since_start->d.' days<br>';
        // echo $since_start->h.' hours<br>';
        // echo $since_start->i.' minutes<br>';
        // echo $since_start->s.' seconds<br>';

        // dd($s);
        
        if ($since_start->i >= 0 && $since_start->i < 10){
            return true;
        }
        return false;
    }

    public function getCode(){
        return base64_encode(date("Y-m-d H:i:s"));
    }

}


?>