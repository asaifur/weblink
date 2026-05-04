<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function index()
	{
		// Detect domain
		$host = $_SERVER['HTTP_HOST'];
		// Ambil data domain
		$domain = $this->db
			->where('url_domain', $host)
			->get('table_domain')
			->row_array();
		// Jika domain tidak ada
		if (!$domain) {
			show_404();
		}
		// Meta otomatis dari domain	
		$data['domain'] = $domain;

		$data['menu_header_utama_website'] =  $this->menu_header;
		$domain_id = $this->domain_id;

		$page = $this->Menu_model->get_page_by_slug('home', $domain_id);
		$data['page'] = $page;

		$this->template->load('home', $data);
	}
}
