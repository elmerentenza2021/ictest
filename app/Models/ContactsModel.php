<?php

namespace App\Models;

//use CodeIgniter\Model;
use App\Models\ContactsRespository;

class ContactsModel extends ContactsRespository
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'phone', 'birth', 'coment']; 
    protected $createdField  = 'created_at';

    public function __construct(){
        parent::__construct();
    }

    public function addContact($data){
        
        // do something or check before insert... 
        // if it is necesary
        
        $this->addItem($data);
        
    }

    // to list in the table
    public function getContacts(){
        
        return $this->findAllItems();
        
    }

    // to show the info on updating...
    public function getContactById($id){

        return $this->findItemById($id);
        
    }

    
    public function updateContact($data){
        
        $this->updateItem($data);
    }


    public function deleteContact($id){
        
        $this->deleteItem($id);
    }


    public function doTest(){
        return $this->test();
    }
    
}