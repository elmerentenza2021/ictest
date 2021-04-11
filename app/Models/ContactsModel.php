<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactsModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'phone', 'birth', 'coment']; 
    protected $createdField  = 'created_at';

    public function addContact($data){
        $db = \Config\Database::connect();
        $sql = "INSERT INTO ".
            "contact(type_id, name, phone, birth, coment, created) ".
            "VALUES ('".
                $data['type_id']."', '".
                $data['name']."', '".
                $data['phone']."', '".
                $data['birth']."', '".
                $data['coment']."', ".
                "now() )";
        // dd($sql);
        return $db->query($sql);
    }

    // to list in the table
    public function getContacts(){
        $db = \Config\Database::connect();
        $sql = "SELECT ".
                "contact.id as id, ".
                "contact.name as name, ".
                "types.type as type, ".
                "contact.phone as phone, ".
                "contact.birth as birth ".
                //"contact.coment as coment ".
                "FROM contact INNER JOIN types on contact.type_id = types.id";
        //dd($sql);
        $query = $db->query($sql);
        return $results = $query->getResult();
    }

    // to show the info on updating...
    public function getContactById($id){
        //dd($id);
        $db = \Config\Database::connect();
        $sql = "SELECT ".
                "contact.id as id, ".
                "contact.name as name, ".
                "contact.type_id as type, ".
                "contact.phone as phone, ".
                "contact.birth as birth, ".
                "contact.coment as coment ".
                "FROM contact INNER JOIN types on contact.type_id = types.id ".
                "where contact.id = ". $id;
        
        // dd($sql);
        $query = $db->query($sql);
        $results = $query->getResultArray();
        
        return $results[0];
    }

    public function updateContact($data){
        $db = \Config\Database::connect();
        $query = "UPDATE contact SET ".
            "type_id=".$data['type_id'].", ".
            "name='".$data['name']."', ".
            "phone='".$data['phone']."', ".
            "birth='".$data['birth']."', ".
            "coment='".$data['coment']."' ".
            " WHERE id=".$data['id']." ";
        return $db->query($query);
    }
    
}