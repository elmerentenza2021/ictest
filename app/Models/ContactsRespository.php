<?php 

namespace App\Models;

use CodeIgniter\Model;
// use App\Models\IRepository;
// use App\Repository\IRepository;

class ContactsRespository extends Model //implements IRepository
{
    protected $table;
    protected $primaryKey;
    protected $allowedFields; 
    protected $createdField;

    public function __construct(){

        parent::__construct();

    }

    protected function addItem($data){
        
        $db = \Config\Database::connect();
        $sql = "INSERT INTO ".
            "contact(type_id, name, phone, birth, coment, created) ".
            "VALUES (".

            $db->escape($data['type_id']).", '".
            $db->escapeString($data['name'])."', '".
            $db->escapeString($data['phone'])."', '".
            $db->escapeString($data['birth'])."', '".
            $db->escapeString($data['coment'])."', ".
                "now() )";
        // dd($sql);
        return $db->simpleQuery($sql);
    }

    protected function findAllItems($limit=0) {
        $db = \Config\Database::connect();
        $sql = "SELECT ".
                "contact.id as id, ".
                "contact.name as name, ".
                "types.type as type, ".
                "contact.phone as phone, ".
                "contact.birth as birth ".
                //"contact.coment as coment ".
                "FROM contact INNER JOIN types on contact.type_id = types.id ";
        
        $query = $db->query($sql);
        
        $results = $query->getResult();
        
        return $results;
    }

    protected function findItemById($id){

        $db = \Config\Database::connect();
        $sql = "SELECT ".
                "contact.id as id, ".
                "contact.name as name, ".
                "contact.type_id as type, ".
                "contact.phone as phone, ".
                "contact.birth as birth, ".
                "contact.coment as coment ".
                "FROM contact INNER JOIN types on contact.type_id = types.id ".
                "where contact.id = ". $db->escape($id);
        
        // dd($sql);
        $query = $db->query($sql);
        $results = $query->getResultArray();
        
        return $results[0];        
    }

    protected function updateItem($data){
        $db = \Config\Database::connect();
        $query = "UPDATE contact SET ".
                    "type_id=".$db->escape($data['type_id'])." ";
        if ($data['name']) 
            $query .= ", name='".$db->escapeString($data['name'])."' ";

        if ($data['phone']) 
            $query .= ", phone='".$db->escapeString($data['phone'])."' ";

        if ($data['birth']) 
            $query .= ", birth='".$db->escapeString($data['birth'])."' ";

        if ($data['coment']) 
            $query .= ", coment='".$db->escapeString($data['coment'])."' ";
        
        $query .= " WHERE id=".$db->escape($data['id'])." ";

        return $db->simpleQuery($query);        
    }

    protected function deleteItem($id){
        $this->delete($id);
    }

    protected function test(){
        dd($this->allowedFields);
        return "test ok";
    }
    
}

?>