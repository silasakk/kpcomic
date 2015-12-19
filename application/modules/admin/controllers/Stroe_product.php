<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends Public_Controller {

	public $table = "store";

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}

	public function index()
	{
		$sql = "select * from ".$this->table." order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('store/index',$data);
	}
	public function form($id=null)
	{
		if($id){
			$sql = "select * from ".$this->table." where id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->name = null;
			$data["data"][0]->address = null;
			$data["data"][0]->tel = null;
			$data["data"][0]->lat = null;
			$data["data"][0]->lng = null;
			$data["data"][0]->store_time = null;
			$data["data"][0]->hh = null;
			$data["data"][0]->mm = null;
		}
		
		$this->template->build('store/form',$data);
	}

	




}
