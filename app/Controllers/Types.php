<?php

namespace App\Controllers;

use App\Models\TypesModel;
use CodeIgniter\Controller;

class Types extends Controller
{
    public function index()
    {

        $data = [
            'locale' => $this->request->getLocale()
        ];
        return view('types/main', $data);
    }

    public function getlist(){
        $model = new TypesModel();
        $results = $model->findAll();
        $res=[];
        
        foreach ($results as $row)
        {
            $e = [
                'id'    => $row['id'],
                'type'  => $row['type'],
            ];
            
            $res[] = $e;
        }
        
        return $this->response->setJSON($res);        
    }


    public function add(){

        $t = $this->request->getVar('type');

        $model = new TypesModel();
        $type = $model->where('type', $t)->first();        

        if (!$type){
            $data = [
                'type' => $t,
            ];
            $model->insert($data);        
        }
        
        header("Location: /types/");
        exit;

    }

    public function delete($id){
        
        if ($id){
            $model = new TypesModel();
            $model->delete($id);
        }

        header("Location: /types/");
        exit;
    }
    
}
