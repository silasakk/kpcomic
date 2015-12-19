<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Public_Controller {

	public $table = "product";
	public $api_id = "LBGuCCqmEM2lmPO7vmohk5yYqTnRwfTD";
	public $api_key = "qYc8hNfMOhWhtC7PsEsW9FJeEFMdqxhj";

	public function __construct()
	{
	    parent::__construct();
	    $this->template->set_theme('admin');
        $this->template->set_layout('index');
	    
	}



	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://milin.ready.co.th/api/?action=GetProduct&api_id={$this->api_id}&api_key={$this->api_key}");
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);

		$this->update_list(json_decode($output));
//		header('Content-Type: application/json');
//		echo $output;die;



		$sql = "select * from product order by created_at desc";
		$qry = $this->db->query($sql);
		$data["data"] = $qry->result();
		$this->template->build('product/index',$data);
	}

	public function form($id=null)
	{

		if($id){
			$sql = "select * from ".$this->table." where product_id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->name = null;
			$data["data"][0]->detail = null;
			$data["data"][0]->image = null;
			$data["data"][0]->image_hover = null;
			$data["data"][0]->gallery = null;
			$data["data"][0]->status = null;
			$data["data"][0]->price = null;
			$data["data"][0]->sale_price = null;
			$data["data"][0]->category = null;
			$data["data"][0]->brand = null;
			$data["data"][0]->collection = null;
			$data["data"][0]->qty = null;
			$data["data"][0]->slug = null;
			

		}

		$this->template->build('product/form',$data);
	}
	public function form_unit($id=null)
	{

		//$data["meta"] = load_meta($id,$this->table);

		if($id){
			$sql = "select * from ".$this->table."_unit where product_unit_id = '".$id."'";
			$qry = $this->db->query($sql);
			$data["data"] = $qry->result();
		}else{
			$data["data"][0] = new stdClass();
			$data["data"][0]->id = null;
			$data["data"][0]->code = null;
			$data["data"][0]->detail = null;
			$data["data"][0]->image = null;
			$data["data"][0]->gallery = null;
            $data["data"][0]->thumb_color = null;
			$data["data"][0]->status = null;
			$data["data"][0]->price = null;
			$data["data"][0]->sale_price = null;
			$data["data"][0]->color = null;
			$data["data"][0]->size = null;
			$data["data"][0]->qty = null;
			$data["data"][0]->slug = null;


		}


		$this->template->build('product/form_unit',$data);
	}

	public function save($id=null)
	{
		
		$item = array();
		if($this->input->post('gall')){
			foreach ($_POST["gall"] as $key => $value) {
				$item[] = array("image"=>$_POST["gall"][$key]);
			}
		}
		if($id){
			$data = array(
               'name' 			        => $this->input->post('name') ,
               'detail' 	        	=> $this->input->post('detail') ,
               'image' 			        => @$_POST["thumbnail"][0],
			   'image_hover'            => @$_POST["image_hover"][0],
               'category'               => $this->input->post('category') ,
               'brand' 		            => $this->input->post('brand') ,
               'collection' 	        => $this->input->post('collection') ,
               'product_status_new'     => $this->input->post('product_status_new') ,
               'product_status_top'     => $this->input->post('product_status_top') ,
			   'gallery'	    => serialize($item)
            );
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
               'name' 			=> $this->input->post('name') ,
               'detail' 			=> $this->input->post('detail') ,
               'image' 			=> @$_POST["thumbnail"][0],
				'image_hover'    => @$_POST["image_hover"][0],
               'category'    => $this->input->post('category') ,
               'brand' 		=> $this->input->post('brand') ,
               'collection' 	=> $this->input->post('collection') ,
			   'gallery'	    => serialize($item),            
			   'created_at' => date("Y-m-d H:i:s")
            );
			$this->db->insert($this->table, $data);
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}
		
		redirect("/admin/product/form/".$id);
	}
	public function save_unit($id=null)
	{

		$item = array();
		if($this->input->post('gall')){
			foreach ($_POST["gall"] as $key => $value) {
				$item[$key] = array("image"=>$_POST["gall"][$key]);
			}
		}
		if($id){
			$data = array(
				'code' 			=> $this->input->post('code') ,
				'product_id' 	=> $this->input->post('product_id') ,
				'detail' 			=> $this->input->post('detail') ,
				'image' 			=> @$_POST["thumbnail"][0],
                'thumb_color' 			=> @$_POST["thumb_color"][0],
				'qty' 			=> $this->input->post('qty') ,
                'color' 		    => $this->input->post('color') ,
                'size' 		    => $this->input->post('size') ,
				'price' 		    => $this->input->post('price') ,
				'sale_price'     => $this->input->post('sale_price') ,
				'gallery'	    => serialize($item)
			);
			$this->db->where('product_unit_id', $id);
			$this->db->update($this->table."_unit", $data);
			$this->session->set_flashdata("success",true);

		}else{
			$data = array(
				'code' 			=> $this->input->post('code') ,
                'product_id' 	=> $this->input->post('product_id') ,
				'detail' 			=> $this->input->post('detail') ,
				'image' 			=> $_POST["thumbnail"][0],
                'thumb_color' 			=> @$_POST["thumb_color"][0],
				'qty' 			=> $this->input->post('qty') ,
                'color' 		    => $this->input->post('color') ,
                'size' 		    => $this->input->post('size') ,
				'price' 		    => $this->input->post('price') ,
				'sale_price'     => $this->input->post('sale_price') ,
				'gallery'	    => serialize($item),
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert($this->table."_unit", $data);
			$id = $this->db->insert_id();
			$this->session->set_flashdata("success",true);
		}


		redirect("/admin/product/form_unit/".$id);
	}
	public function delete($id)
	{
		if($id){
			$this->db->delete($this->table, array('id' => $id)); 
		}
		redirect("admin/event/");
	}

	function update_list($data){


		foreach($data->products as $value){

			//select query
			$sql = "select * from product where product_id = '{$value->product_id}'";
			$qry = $this->db->query($sql);
			$row = $qry->row();
			if($row){
				$arr = array(
					"name" => $value->product_name,
					"category" => @$value->category_name,
					"brand" => @$value->brand_name,
					"collection" => @$value->collection->name
				);
				$this->db->where("product_id" , $value->product_id);
				$this->db->update("product",$arr);
			}else{
				$arr = array(
					"product_id" => $value->product_id,
					"name" => $value->product_name,
                    "slug" => slug($value->product_name),
					"category" => @$value->category_name,
					"brand" => @$value->brand_name,
					"collection" => @$value->collection->name,
					"created_at" => date("Y-m-d"),
				);
				$this->db->insert("product",$arr);
			}


			if(isset($value->unit)){
				$this->update_unit($value->product_id,$value->unit);
			}

		}

	}
	function update_unit($product_id,$data){

		foreach($data as $value){



			//select query
			$sql = "select * from product_unit where product_unit_id = '{$value->product_unit_id}'";
			$qry = $this->db->query($sql);
			$row = $qry->row();
			if($row){
				$arr = array(
					"product_id" => $product_id,
					"product_unit_id" => $value->product_unit_id,
					"code" => $value->code,
					"color" => $value->color,
					"price" => $value->price,
					"size" => $value->size,
					"qty" => $value->quantity
				);
				$this->db->where("product_unit_id" , $value->product_unit_id);
				$this->db->update("product_unit",$arr);
			}else{
				$arr = array(
					"product_id" => $product_id,
					"product_unit_id" => $value->product_unit_id,
					"code" => $value->code,
					"color" => $value->color,
					"price" => $value->price,
					"qty" => $value->quantity,
					"size" => $value->size,
					"created_at" => date("Y-m-d"),
				);
				$this->db->insert("product_unit",$arr);
			}



		}

	}
}