<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('page_dashboard/login');
	}
	public function home()
	{
		$content['header']  = $this->load->view('layouts_dashboard/header');
		$content['content'] = $this->load->view('page_dashboard/home');
		$content['footer']  = $this->load->view('layouts_dashboard/footer');
		
		$this->load->view('layouts_dashboard/page',$content);
	}
	public function invoice()
	{
		$content['header']  = $this->load->view('layouts_dashboard/header');
		$content['content'] = $this->load->view('page_dashboard/invoice');
		$content['footer']  = $this->load->view('layouts_dashboard/footer');
		
		$this->load->view('layouts_dashboard/page',$content);
	}
	public function detail_invoice()
	{
		$content['header']  = $this->load->view('layouts_dashboard/header');
		$content['content'] = $this->load->view('page_dashboard/detail_invoice');
		$content['footer']  = $this->load->view('layouts_dashboard/footer');
		
		$this->load->view('layouts_dashboard/page',$content);
	}
	public function analytic()
	{
		if(isset($_COOKIE['gacctkn'])) {
			$analytic['gauthStore'] =  $this->AuthModel->checkAccessToken(array('access_token' => $_COOKIE['gacctkn']));
			
			$content['header']  = $this->load->view('layouts_dashboard/header');
			$content['content'] = $this->load->view('page_dashboard/analytic', $analytic);
			$content['footer']  = $this->load->view('layouts_dashboard/footer');
			

			return $this->load->view('layouts_dashboard/page',$content);
		} else {
			return redirect('/login', 'refresh');
		}
	}
}
