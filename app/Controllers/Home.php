<?php

namespace App\Controllers;


use Config\Services;
use App\Controllers\Msg;
class Home extends BaseController
{
	public function index()
	{
		header("Location: /en/");
		exit;
		
		// $url = $_SERVER['HTTP_HOST'];

		// dd($_SERVER);
		
		// header('Location: ' . $_SERVER['HTTP_HOST']. '/contacts/' );
		// exit;
		// $this->request->config->baseURL = "http://".$_SERVER['HTTP_HOST'];
		$locale = $this->request->getLocale();
		print $locale; print "<br />";

		// echo lang('Validation.fruta')."<br />";

		//$this->request->setLocale('es');
		//$locale = $this->request->getLocale();
		//print $locale; print "<br />";
		
		
		
		
		//print lang('Validation.fruta')."<br />";

		
		// $locale = service('request')->getLocale();
		// print $locale;
		// $session = session();
		// $session->set('lang','es');
		// print Idiom::show('fruit', $session->get('lang'));
		// $session->set('lang','en');
		// print Idiom::show('fruit', $session->get('lang'));
			
			
			// // $session->remove('lang');
			// // $session->set('lang','en');
			// $this->request->setLocale('en');
			// $locale = $this->request->getLocale();
			// print $locale;
			
			
			// $url = base_url();
			// print $url;
			// print "<br />";
			// print getLocale();
			// return redirect()->to($url);     
		
		
		// return redirect()->to('/');
		
		return view('welcome_message');
	}
}
