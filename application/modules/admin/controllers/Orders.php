<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Public_Controller {

    public $table = "orders";

    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('admin');
        $this->template->set_layout('index');

    }


    public function index()
    {
        $sql = "select * from orders where admin_delete = '0' order by created_at desc";
        $qry = $this->db->query($sql);
        $data["data"] = $qry->result();
        $this->template->build('orders/index',$data);
    }

    public function form($id=null)
    {

        $data['order_id'] = $id;
        $this->template->build('orders/form',$data);
    }

    public function save($id=null)
    {
        //insert order
        $data_order = array(
            'remark' => $this->input->post('remark'),
            'subtotal' => $this->input->post('subtotal'),
            'total' => $this->input->post('total'),
            'discount' => $this->input->post('discount'),
            'shipping' => $this->input->post('shipping'),
            'name' => $this->input->post('member_name'),
            'lastname' => $this->input->post('member_lastname'),
            'email' => $this->input->post('member_email'),
            'telephone' => $this->input->post('member_telephone'),
            'address' => $this->input->post('member_address'),
            'member_id' => $this->input->post('member_member_id'),
            'created_at' => date("Y-m-d H:i:s")
        );
        $this->db->insert("orders",$data_order);
        $order_id = $this->db->insert_id();

        //insert order detail
        var_dump($_POST);
        $orders_dtl = $this->input->post("product_unit_id");
        foreach($orders_dtl as $key => $item){
            $data = array(
                'order_id' => $order_id,
                'product_unit_id' => $_POST["product_unit_id"][$key],
                'name' => $_POST["product_name"][$key],
                'code' => $_POST["product_code"][$key],
                'price' => $_POST["product_price"][$key],
                'qty' => $_POST["product_qty"][$key],
                'total' => $_POST["product_price"][$key] * $_POST["product_qty"][$key],
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert("orders_dtl",$data);
        }
    }

    public function delete($id)
    {
        if($id){
            $data = array('admin_delete' => 1);
            $this->db->where('id', $id);
            $this->db->update('orders', $data);
        }
        redirect("admin/orders/");
    }

    function get_order($id){
        //select query
        $sql = "select * from orders where id = '{$id}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        header('Content-type: application/json');
        echo json_encode($result);
    }

    function get_order_detail($id){
        //select query
        $sql = "select orders_dtl.*,product_unit.image

                from orders_dtl
                left join product_unit on orders_dtl.product_unit_id = product_unit.product_unit_id
                where order_id = '{$id}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        header('Content-type: application/json');
        echo json_encode($result);
    }
}