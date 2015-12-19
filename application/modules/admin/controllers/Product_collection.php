<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_collection extends Public_Controller
{
    public $api_id;
    public $api_key;
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_collection_model');
        $this->load->library('form_validation');
        $this->api_id = $this->config->item('api_id');
        $this->api_key = $this->config->item('api_key');
    }

    public function index()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://milin.ready.co.th/api/?action=GetProductCollection&api_id={$this->api_id}&api_key={$this->api_key}");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

//        header('Content-Type: application/json');
//		echo $output;die;


        $this->update_list(json_decode($output));

        $product_collection = $this->product_collection_model->get_all();

        $data = array(
            'product_collection_data' => $product_collection
        );

        $this->template->build('product_collection/product_collection_list', $data);
    }

    public function read($id) 
    {
        $row = $this->product_collection_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'order_by' => $row->order_by,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->template->build('product_collection/product_collection_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_collection'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/product_collection/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'order_by' => set_value('order_by'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->template->build('product_collection/product_collection_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'order_by' => $this->input->post('order_by',TRUE),
		'created_at' => date("Y-m-d H:i:s"),

	    );

            $this->product_collection_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/product_collection'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->product_collection_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/product_collection/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'order_by' => set_value('order_by', $row->order_by),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->template->build('product_collection/product_collection_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_collection'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'order_by' => $this->input->post('order_by',TRUE),

	    );

            $this->product_collection_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/product_collection'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->product_collection_model->get_by_id($id);

        if ($row) {
            $this->product_collection_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/product_collection'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_collection'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', ' ', 'trim|required');
	$this->form_validation->set_rules('order_by', ' ', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    function update_list($data){


        foreach($data->collections as $value){

            //select query
            $sql = "select * from product_collection where id = '{$value->id}'";
            $qry = $this->db->query($sql);
            $row = $qry->row();
            if($row){
                $arr = array(
                    "name" => $value->name,
                    "created_at" => $value->name,
                );
                $this->db->where("id" , $value->id);
                $this->db->update("product_collection",$arr);
            }else{
                $arr = array(

                    "name" => $value->name,
                );
                $this->db->insert("product_collection",$arr);
            }

        }

    }

};

/* End of file Product_collection.php */
/* Location: ./application/controllers/Product_collection.php */