<?php

namespace App\Controllers;

use App\Models\ContactsModel;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        
        $model = new NewsModel();
        
        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        dd($data['news']);
    
        echo view('template/header', $data);
        echo view('news/overview', $data);
        echo view('template/footer', $data);
    }

    public function view($slug = NULL)
    {
        $model = new NewsModel();
    
        $data['news'] = $model->getNews($slug);
    
        if (empty($data['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }
    
        $data['title'] = $data['news']['title'];
    
        echo view('template/header', $data);
        echo view('news/view', $data);
        echo view('template/footer', $data);
    } 
    
    public function create()
    {
        $model = new NewsModel();
    
        if ($this->request->getMethod() === 'post' && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'body'  => 'required',
            ]))
        {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
                'body'  => $this->request->getPost('body'),
            ]);
    
            echo view('news/success');
    
        }
        else
        {
            echo view('template/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('template/footer');
        }
    }    
}