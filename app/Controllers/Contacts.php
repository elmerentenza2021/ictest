<?php

namespace App\Controllers;

use App\Models\ContactsModel;
use CodeIgniter\Controller;


use App\Libraries\MySecurity;
use App\Libraries\ConnectionTester;

class Contacts extends Controller
{
    public function __construct(){

        $this->connTester = new ConnectionTester();
        $this->chkSecurity = new MySecurity();
        $this->model = new ContactsModel();
    }
    
    public function index()
    {
        
        $this->connTester->testConnection();
        
        $data = [
            'locale' => $this->request->getLocale(),
            'security' => $this->chkSecurity->getCode()
        ];
        return view('template/main', $data);
    }
    
    public function getlist(){
        
        $results = $this->model->getContacts();
        return $this->response->setJSON($results);
    }

    public function add(){
        
        if ($this->chkSecurity->isSecure($this->request->getVar('security'))){
            $this->model->addContact($this->request);
        }

        header("Location: /".$this->request->getLocale()."/");
        exit;
    }

    public function delete($id){
        
        $this->model->deleteContact($id);

        header("Location: /".$this->request->getLocale()."/");
        exit;
    }

    public function load($id){
        
        $data = $this->model->getContactById($id);
        
        if ($data){
            $data['locale'] = $this->request->getLocale();
            $data['security'] = $this->chkSecurity->getCode();
        }

        echo view('template/main', $data);
    }

    public function update($id){

        
        $this->model->updateContact($id, $this->request);
        
        header("Location: /".$this->request->getLocale()."/");
        exit;
    }

    public function test(){
        
        // $text='';
        // $text = \strtolower($text);
        // $regex='/^[a-z]+[a-z ]+$/';
        // print $text."<br />";
        // echo (preg_match($regex,$text)) ? "CORRECTO" : "ERROR";        
        
        $this->model->doTest();
    }
    
}