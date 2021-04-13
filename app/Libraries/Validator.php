<?php

namespace App\Libraries;

class Validator{
    
    public function Name($str){

        // only letters and spaces
        
        $text = \strtolower($str);
        $regex='/^[a-z]+[a-z ]+$/';

        return preg_match($regex,$text);
    }

    public function Phone($str){

        // validate a phone number

        return true;
    }


    public function Birthday($str){
        $debug = true;
        
        // it has to be past, not future
        //2023-12-31
        print ($debug) ? $str." <br />" : "";

        $arr = explode("-",$str);
        if (count($arr) != 3) {
            print ($debug) ? "arr more than 3 elements <br />" : "";
            return false;
        }

        $now_day = date('d');
        $now_month = date('m');
        $now_year = date('Y');

        $year   = $arr[0];
        $month  = $arr[1];
        $day    = $arr[2];

        $dif = intval($now_year) - intval($year);

        if (intval($year) > intval($now_year) || $dif > 115){
            print ($debug) ? "wrong year : not yet or too old <br />" : "";
            return false;
        }

        if ($year === $now_year){

            if (intval($month) > intval($now_month)){
                print ($debug) ? "wrong month .... it is future <br />" : "";
                return false;
            }

            if (intval($month) === intval($now_month)){

                if (intval($day) >= intval($now_day)){
                    print ($debug) ? "wrong day... some day in the future <br />" : "";
                    return false;
                }
                
            }
        }

        return true;
    }


}


?>