<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct(){
        parent::__construct();
    }

	public function get_all_book($book_query='')
	{
		//
        $arr_query = array();
        if ($book_query){
            foreach (explode('&&', $book_query) as $value) {
                $tmp = explode('=', $value, 2);
                if ($tmp[0] != '' && $tmp[1] != ''){
                    $arr_query[$tmp[0]] = $tmp[1];
                }
                // echo $value;
            }
            print_r($arr_query);
            // echo $book_query;
        }
        else {
            echo 'NO eeee';
        }
		// $query=$this->db->get("book");
        // $data=$query->result_array();
	}

    public function get_book_in_category($cata='')
    {
        $arr_query = array();
        if ($book_query){
            foreach (explode('&&', $book_query) as $value) {
                $tmp = explode('=', $value, 2);
                if ($tmp[0] != '' && $tmp[1] != ''){
                    $arr_query[$tmp[0]] = $tmp[1];
                }
                // echo $value;
            }
            print_r($arr_query);
            // echo $book_query;
        }
        else {
            echo 'NO eeee';
        }
        // $query=$this->db->get("book");
        // $data=$query->result_array();
    }
}
