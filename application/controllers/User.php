<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
    }

	public function get_all_user($level=array(),$kia=-1)
	{
		$this->db->order_by("level", "desc");
		if ($kia >= 0){
			$this->db->where('kia =', $kia);
		}
		if (count($level)){
			$this->db->where_in("level", $level);
		}
		$query=$this->db->get("res_user");
        $data=$query->result_array();
        echo "<pre>";
        $html = "<pre>";
        // $html += "ere";
        foreach ($data as $one_user) {
        	// print_r($one_user);
        	// echo $one_user['id'];
		    $html .= "<p>";
		    $html .= $one_user['level']."</br>";
		    $html .= $one_user['displayname']."</br>";
		    $html .= $one_user['username']."</br>";
		    $html .= $one_user['title']."</br>";
		    $html .= "</p>";
		}
		$html .= "</pre>";
		echo $html;
        // print_r($data[0]['id']);
        echo "</pre>";
        // print_r($data);
		// $this->load->view('welcome_message');
	}
}
