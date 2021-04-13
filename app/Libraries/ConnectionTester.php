<?php

namespace App\Libraries;

class ConnectionTester{
    
    public function testConnection(){
        try {
            $db = db_connect();
            if (!$db->connect()) print "DB Connection Error ... please fix it first.!!!"; 

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}


?>