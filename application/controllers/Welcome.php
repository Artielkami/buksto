<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        // load session de lam card
        $this->load->library("session");
        $this->load->helper(array('url', 'form'));
        // load database de dung
        // $this->load->database();    
    }

	public function index()
	{
		// 
		$query=$this->db->query("SELECT * FROM book1 order By id");
        $data=$query->result_array();
        echo "<pre>";
        print_r($data[0]['id']);
        echo "</pre>";
		$this->load->view('welcome_message');
	}
}
