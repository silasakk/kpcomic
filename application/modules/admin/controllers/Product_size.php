<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_size extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_size_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $product_size = $this->product_size_model->get_all();

        $data = array(
            'product_size_data' => $product_size
        );

        $this->template->build('product_size/product_size_list', $data);
    }

    public function read($id) 
    {
        $row = $this->product_size_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'order_by' => $row->order_by,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->template->build('product_size/product_size_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_size'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/product_size/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'order_by' => set_value('order_by'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->template->build('product_size/product_size_form', $data);
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

            $this->product_size_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/product_size'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->product_size_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/product_size/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'order_by' => set_value('order_by', $row->order_by),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->template->build('product_size/product_size_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_size'));
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

            $this->product_size_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/product_size'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->product_size_model->get_by_id($id);

        if ($row) {
            $this->product_size_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/product_size'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product_size'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', ' ', 'trim|required');
	$this->form_validation->set_rules('order_by', ' ', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Product_size.php */
/* Location: ./application/controllers/Product_size.php */