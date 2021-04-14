<?php

namespace App\Models;

//use CodeIgniter\Model;
use App\Models\ContactsRespository;
use App\Libraries\Validator;

class ContactsModel extends ContactsRespository
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'phone', 'birth', 'coment']; 
    protected $createdField  = 'created_at';
    
    public function __construct(){
        
        parent::__construct();

        $this->validator = new Validator();
    }

    public function addContact($request){
        
        $errors = 0;
        $data = [
            'name'      => '',
            'type_id'   => 0,
            'phone'     => '',
            'birth'     => '',
            'coment'    => '',
        ];

        if ($this->validator->Name($request->getVar('name'))){
            $data['name'] = $request->getVar('name');
        }
        else $errors++;

        if ($request->getVar('type'))
            $data['type_id'] = $request->getVar('type');
        else $errors++;

        
        if ($this->validator->Phone($request->getVar('phone'))){
            $data['phone'] = $request->getVar('phone');
        }
        //else $errors++; /// this field is not required

        if ($this->validator->Birthday($request->getVar('birth'))){
            $data['birth'] = $request->getVar('birth');
        }
        else $errors++;

        if ($request->getVar('coment'))
            $data['coment'] = $request->getVar('coment');
        else $errors++;
        
        if (!$errors)
            $this->addItem($data);
    }

    // to list in the table
    public function getContacts(){
        
        $results = $this->findAllItems();
        
        $res=[];
        foreach ($results as $row)
        {
            $e = [
                'id'    => $row->id,
                'name'  => $row->name,
                'type'  => $row->type,
                'phone' => $row->phone,
                'birth' => $row->birth
            ];
            $res[] = $e;
        }
        return $res;
        
    }

    // to show the info on updating...
    public function getContactById($id){
        $item = $this->findItemById($id);
        
        $data = [];
        if ($item){
            $data = [
                'flag'  => 'updating',
                'id'    => $item['id'],
                'name'  => $item['name'],
                'type'  => $item['type'],
                'phone' => $item['phone'],
                'birth' => $item['birth'],
                'coment'=> $item['coment'],
            ];
        }
        // dd($data);
        return $data;
    }

    
    public function updateContact($id, $request){
        
        $item = $this->getContactById($id);
        $data = [];
        if ($item){
            $data['id'] = $id;

            if ($request->getVar('name')) {
                $data['name'] = $request->getVar('name');
            }
                
            if ($request->getVar('type')) {
                $data['type_id'] = $request->getVar('type');
            }
             
            if ($request->getVar('phone')) {
                $data['phone'] = $request->getVar('phone');
            }
            
            if ($request->getVar('birth')) {
                $data['birth'] = $request->getVar('birth');
            }

            if ($request->getVar('coment')) {
                $data['coment'] = $request->getVar('coment');
            }
   
            $this->updateItem($data);
        }
    }   


    public function deleteContact($id){
        
        $this->deleteItem($id);
    }


    public function doTest(){

        $d = 'Elmer Entenza';
        print ($this->validator->Name($d)) ?
            $d." ---CORRECTO" : $d." ----INCORRECTO";
        return ;

        return $this->test();
    }
    
}