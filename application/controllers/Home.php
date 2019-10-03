<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$content['header']  = $this->load->view('layouts/header');
		$content['content'] = $this->load->view('home');
		$content['footer']  = $this->load->view('layouts/footer');
		
		$this->load->view('layouts/page',$content);
	}
	public function contact()
	{
		$content['header']  = $this->load->view('layouts/header');
		$content['content'] = $this->load->view('contact');
		$content['footer']  = $this->load->view('layouts/footer');
		
		$this->load->view('layouts/page',$content);
	}
}
