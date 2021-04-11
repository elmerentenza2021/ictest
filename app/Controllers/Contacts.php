<?php

namespace App\Controllers;

use App\Models\ContactsModel;
use CodeIgniter\Controller;

class Contacts extends Controller
{
    public function index()
    {
        
        
        try {
            $db = db_connect();
            if (!$db->connect()) print "DB Connection Error ... please fix it first.!!!"; 

        } catch (\Throwable $th) {
            throw $th;
        }
        
        $data = [
            'locale' => $this->request->getLocale(),
            'security' => base64_encode(date("Y-m-d H:i:s"))
        ];
        return view('template/main', $data);
    }
    
    public function getlist(){
        $model = new ContactsModel();
        $results = $model->getContacts();
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
        return $this->response->setJSON($res);
    }

    public function add(){
        
        $s = base64_decode($this->request->getVar('security'));
        
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
            $model = new ContactsModel();
            
            $data = [
                'name'      => $this->request->getVar('name'),
                'type_id'   => $this->request->getVar('type'),
                'phone'     => $this->request->getVar('phone'),
                'birth'     => $this->request->getVar('birth'),
                'coment'    => $this->request->getVar('coment'),
            ];
            $model->addContact($data);
        }

        
        header("Location: /".$this->request->getLocale()."/");
        //return view('template/redir');
        exit;
    }

    public function delete($id){
        $model = new ContactsModel();
        $model->delete($id);

        header("Location: /".$this->request->getLocale()."/");
        //return view('template/redir');
        exit;
    }

    public function load($id){
        $model = new ContactsModel();
        $item = $model->getContactById($id);
        //dd($item);
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
                
                'locale' => $this->request->getLocale(),
                'security' => base64_encode(date("Y-m-d H:i:s"))
            ];
        }
        // dd($data);

        echo view('template/main', $data);
    }

    public function update($id){


        $model = new ContactsModel();
        $item = $model->getContactById($id);
        
        
        if ($item){
            $data = [
                'id'    => $id,
                'name'  => $this->request->getVar('name'),
                'type_id'  => $this->request->getVar('type'),
                'phone' => $this->request->getVar('phone'),
                'birth' => $this->request->getVar('birth'),
                'coment'=> $this->request->getVar('coment'),
                'security' => base64_encode(date("Y-m-d H:i:s"))
            ];
            
            $r = $model->updateContact($data);
        }

        header("Location: /".$this->request->getLocale()."/");
        // return view('template/redir');
        exit;
    }

    public function test(){
        $model = new ContactsModel();
        $model->getContacts();
    }
    
}