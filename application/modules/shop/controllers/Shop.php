<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends Public_Controller
{

    public $limit = 8;
    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('milin');
        $this->template->set_layout('index');
        if(!isset($_COOKIE['lang'])){
            setcookie ('lang', 'en' , time()+2678400 ,"/");
        }

    }

    public function type($type = "new",$page = 1)
    {


        /******* assign order ********************/
        if(@$_GET['order'] == "desc"){
            $order  =  "desc";

        }else{
            $order  =  "asc";
        }

        /******* product status ********************/
        if($type == "new"){
            $type_query = "and product.product_status_new = 'new' ";
            $text = "New Arrival";
        }elseif($type == "top"){
            $type_query = "and product.product_status_top = 'top' ";
            $text = "Top Seller";
        }elseif($type == "sale"){
            $type_query = "and product_unit.sale_price != '' ";
            $text = "Sale";
        }else{
            $type_query = "";
        }

        //select query All
        $sql = "select
                product.*,
                product_unit.product_unit_id,
                product_unit.price,
                product_unit.sale_price
                from  product
                left join product_unit on product.product_id = product_unit.product_id
                 where product_unit.product_unit_id  is not null {$type_query}
                group by product_unit.product_id
                order by product_unit.price {$order}
                ";
        $qry_total = $this->db->query($sql);

        //select query pagination
        $offset = ($page-1) > 0 ? ($page-1) : 0 ;
        $sql .= "limit ".$offset.",{$this->limit}";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        $data["data"] = $result;
        $data["text"] = $text;
        $data["type"] = $type;
        $data["order"] = $order;
        $data["total_rows"] = $qry->num_rows();

        $config['base_url'] = 'shop/type/'.$type."/".$page;
        $config['total_rows'] = $qry_total->num_rows();
        $config['per_page'] = $this->limit;
        $config['use_page_numbers'] = TRUE;
        $config['last_link'] = false;
        $config['first_link'] = false;
        $config['prev_link'] = '<i class="pe-7s-prev  "></i>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '<i class="pe-7s-next  "></i>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="active">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->template->build('home',$data);


    }
    public function brand($type = "milin",$page = 1)
    {


        /******* assign order ********************/
        if(@$_GET['order'] == "desc"){
            $order  =  "desc";

        }else{
            $order  =  "asc";
        }

        /******* product status ********************/
        if($type == "mimi"){
            $brand_query = "and product.brand = 'mimi' ";
            $text = "MiMi";
        }else{
            $brand_query = "and product.brand = 'milin' ";
            $text = "Milin";
        }

        //select query All
        $sql = "select
                product.*,
                product_unit.product_unit_id,
                product_unit.price,
                product_unit.sale_price
                from  product
                left join product_unit on product.product_id = product_unit.product_id
                 where product_unit.product_unit_id  is not null {$brand_query}
                group by product_unit.product_id
                order by product_unit.price {$order}
                ";
        $qry_total = $this->db->query($sql);

        //select query pagination]
        $offset = ($page-1) > 0 ? ($page-1) : 0 ;
        $sql .= "limit ".$offset.",{$this->limit}";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        $data["data"] = $result;
        $data["text"] = $text;
        $data["type"] = $type;
        $data["order"] = $order;
        $data["total_rows"] = $qry->num_rows();

        $config['base_url'] = 'shop/brand/'.$type."/".$page;
        $config['total_rows'] = $qry_total->num_rows();
        $config['per_page'] = $this->limit;
        $config['use_page_numbers'] = TRUE;
        $config['last_link'] = false;
        $config['first_link'] = false;
        $config['prev_link'] = '<i class="pe-7s-prev  "></i>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '<i class="pe-7s-next  "></i>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="active">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->template->build('home',$data);


    }
    public function collection($type = "milin",$page = 1)
    {


        /******* assign order ********************/
        if(@$_GET['order'] == "desc"){
            $order  =  "desc";

        }else{
            $order  =  "asc";
        }

        /******* product collection ********************/
        if($type ){
            $collection_query = "and product.collection = '".str_replace("|", "/", rawurldecode($type))."' ";
            $text = $type;
        }else{
            $collection_query = "";
            $text = "";
        }

        //select query All
        $sql = "select
                product.*,
                product_unit.product_unit_id,
                product_unit.price,
                product_unit.sale_price
                from  product
                left join product_unit on product.product_id = product_unit.product_id
                 where product_unit.product_unit_id  is not null {$collection_query}
                group by product_unit.product_id
                order by product_unit.price {$order}
                ";
        $qry_total = $this->db->query($sql);

        //select query pagination
        $offset = ($page-1) > 0 ? ($page-1) : 0 ;
        $sql .= "limit ".$offset.",{$this->limit}";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        $data["data"] = $result;
        $data["text"] = $text;
        $data["type"] = $type;
        $data["order"] = $order;
        $data["total_rows"] = $qry->num_rows();

        $config['base_url'] = 'shop/brand/'.$type."/".$page;
        $config['total_rows'] = $qry_total->num_rows();
        $config['per_page'] = $this->limit;
        $config['use_page_numbers'] = TRUE;
        $config['last_link'] = false;
        $config['first_link'] = false;
        $config['prev_link'] = '<i class="pe-7s-prev  "></i>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '<i class="pe-7s-next  "></i>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="active">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->template->build('home',$data);


    }
    public function category($type = null,$page = 1)
    {


        /******* assign order ********************/
        if(@$_GET['order'] == "desc"){
            $order  =  "desc";

        }else{
            $order  =  "asc";
        }

        /******* product status ********************/
        if($type ){
            $brand_query = "and product.category = '".str_replace("|", "/", rawurldecode($type))."' ";
            $text = $type;
        }else{
            $brand_query = "";
            $text = "";
        }

        //select query All
        $sql = "select
                product.*,
                product_unit.product_unit_id,
                product_unit.price,
                product_unit.sale_price
                from  product
                left join product_unit on product.product_id = product_unit.product_id
                 where product_unit.product_unit_id  is not null {$brand_query}
                group by product_unit.product_id
                order by product_unit.price {$order}
                ";
        $qry_total = $this->db->query($sql);

        //select query pagination
        $offset = ($page-1) > 0 ? ($page-1) : 0 ;
        $sql .= "limit ".( $offset  * $this->limit).",{$this->limit}";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        $data["data"] = $result;
        $data["text"] = $text;
        $data["type"] = $type;
        $data["order"] = $order;
        $data["total_rows"] = $qry->num_rows();

        $config['base_url'] = 'shop/category/'.$type."/".$page;
        $config['total_rows'] = $qry_total->num_rows();
        $config['per_page'] = $this->limit;
        $config['use_page_numbers'] = TRUE;
        $config['last_link'] = false;
        $config['first_link'] = false;
        $config['prev_link'] = '<i class="pe-7s-prev  "></i>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '<i class="pe-7s-next  "></i>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="active">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->template->build('home',$data);


    }
    public function item($slug){

        $sql = "select * from product where slug = '".strip_tags($slug)."' ";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        $data['data'] = $result;
        $this->template->build('single-product',$data);
    }

    /**************************** CART ****************************/

    public function cart(){
        $this->template->build('cart');
    }



    public function shipping_info(){
        
        //prepare item
        $prod = $_COOKIE['products'];
        $prod = stripslashes($prod);
        $prod = json_decode($prod,true);

        //get price item
        $subtotal = 0;
        $shipping = $this->input->post('shipping_method') == 'ems' ? 100 : 50 ;

        foreach($prod as $value){
            //set subtotal
            $subtotal = $subtotal + ($value['price'] * $value['qty']);
        }
        //set total
        $total  =  $subtotal + $shipping ;


        //get user
        $sql = "select * from member where id  = '{$this->session->userdata('user_id')}'";
        $qry = $this->db->query($sql);
        $user = $qry->row();

        if(!$qry->num_rows()){
            //insert order
            $data_order = array(

                'subtotal'      => $subtotal,
                'total'         => $total,
                'shipping'      => $shipping,
                'guest'         => 1,
                'created_at'    => date("Y-m-d H:i:s")
            );
        }else{
            //insert order
            $data_order = array(

                'subtotal'      => $subtotal,
                'total'         => $total,
                'shipping'      => $shipping,
                'name'          => $user->name,
                'lastname'      => $user->lastname,
                'email'         => $user->email,
                'telephone'     => $user->telephone,
                'member_id'     => $user->id,
                'created_at'    => date("Y-m-d H:i:s")
            );
        }


        $this->db->insert("orders",$data_order);
        $order_id = $this->db->insert_id();

        foreach($prod as $value){
            //set subtotal
            $data = array(
                'order_id' => $order_id,
                'product_unit_id' => $value["id"],
                'name' => $value["name"],
                'code' => $value["code"],
                'price' => $value["price"],
                'qty' => $value["qty"],
                'total' => $value["price"] * $value["qty"],
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert("orders_dtl",$data);
        }
        $send_value = array(
            'order_id' => $order_id,
            'shipping' => $this->input->post('shipping_method')
        );

        if(@$data_order['guest']){
            $this->template->build('shipping_info_guest',$send_value);
        }else{
            $this->template->build('shipping_info',$send_value);
        }


    }

    function add_order_info(){

        //prepare item
        $prod = $_COOKIE['products'];
        $prod = stripslashes($prod);
        $prod = json_decode($prod,true);

        //get price item
        $subtotal = 0;
        $shipping = $this->input->post('shipping_method') == 'ems' ? 100 : 50 ;

        foreach($prod as $value){
            //set subtotal
            $subtotal = $subtotal + ($value['price'] * $value['qty']);
        }
        //set total
        $total  =  $subtotal + $shipping ;
        $data_order = array(

            'subtotal'      => $subtotal,
            'total'         => $total,
            'shipping'      => $shipping,
            'created_at'    => date("Y-m-d H:i:s")
        );
        $this->db->where('id' , $this->input->post('order_id'));
        $this->db->update("orders",$data_order);

        if($this->check_guest($this->input->post('order_id'))){



            $data = array(

                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'post_code' => $this->input->post('post_code'),
                'telephone' => $this->input->post('telephone'),
                'email' => $this->input->post('email'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),

                'billing' => $this->input->post('billing'),

                'name_bil' => $this->input->post('name_bil'),
                'lastname_bil' => $this->input->post('lastname_bil'),
                'address_bil' => $this->input->post('address_bil'),
                'post_code_bil' => $this->input->post('post_code_bil'),
                'telephone_bil' => $this->input->post('telephone_bil'),
                'email_bil' => $this->input->post('email_bil'),
                'city_bil' => $this->input->post('city_bil'),
                'country_bil' => $this->input->post('country_bil'),

                'shipping' => $this->input->post('shipping_method'),
                'payment_method' => $this->input->post('payment_method')

            );
            $this->db->where('id',$this->input->post('order_id'));
            $this->db->update('orders',$data);

        }else{
            //prepare address
            $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' and id = '{$this->input->post('select_address')}' ";
            $qry = $this->db->query($sql);
            $address = $qry->row();

            $sql = "select * from member_address where member_id = '{$this->session->userdata('user_id')}' and id = '{$this->input->post('select_billing')}' ";
            $qry_bil = $this->db->query($sql);
            if($qry_bil){
                $billing = $qry->row();
            }else{
                $billing = $address;
            }


            $data = array(
                'shipping' => $this->input->post('shipping_method'),
                'address' => $address->address,
                'recipient' => $address->recipient,
                'post_code' => $address->post_code,
                'city' => $address->city,
                'country' => $address->country,
                'payment_method' => $this->input->post('payment_method'),


                'billing' => $this->input->post('billing'),
                'name_bil' => $billing->name,
                'lastname_bil' => @$billing->lastname,
                'address_bil' => $billing->address,
                'post_code_bil' => $billing->post_code,
                'city_bil' => $billing->city,
                'telephone_bil' => $billing->telephone,

                'country_bil' => $billing->country,

            );

            $this->db->where('id',$this->input->post('order_id'));
            $this->db->update('orders',$data);
        }

        //select query
        $sql = "select * from orders where id ='{$this->input->post('order_id')}' ";
        $qry = $this->db->query($sql);
        $order = $qry->result();
        $send_value = array(
            'order_id' => $this->input->post('order_id'),
            'shipping_method' => $this->input->post('shipping_method'),
            'payment_method' => $this->input->post('payment_method'),
            'order' => $order
        );
        $this->template->build('confirm_order',$send_value);


    }
    function check_guest($order_id){
        //select query
        $sql = "select * from orders where id = '{$order_id}'";
        $qry = $this->db->query($sql);
        $result = $qry->row();
        if($result->guest == 1){
            return true;
        }else{
            return false;
        }
    }
    function checkout_complete($order_id){

        $sql = "select * from  orders where id ='{$order_id}'";
        $qry = $this->db->query($sql);
        $row = $qry->row();

        $data['order_id'] = $row->id;

        require_once APPPATH.'libraries/mandrill-api-php/src/Mandrill.php'; //Not required with Composer


        //select query
        $sql_detail = "select * from orders_dtl where order_id = '{$row->id}' ";
        $qry_detail = $this->db->query($sql_detail);
        $result_detail = $qry_detail->result();
        $item = "
        <table style='width: 100%'>
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>TOTAL</th>
            </tr> ";
        foreach($result_detail as $value){
            $item .= "
                <tr>
                    <td>".$value->code."</td>
                    <td>".$value->name."</td>
                    <td>".number_format($value->price,2)."</td>
                    <td>".$value->qty."</td>
                    <td>".number_format($value->total,2)."</td>
                </tr>
            ";
        }
        $item .= "</table>";

        $mandrill = new Mandrill($this->config->item('mandril_key'));
        $template_name = 'Order Completed';
        $template_content = array(
            array(
                'name' => 'order_id',
                'content' => $row->id
            ),
            array(
                'name' => 'fullname',
                'content' => $row->name." ".$row->lastname,
            ),
            array(
                'name' => 'item',
                'content' => $item
            ),
            array(
                'name' => 'total',
                'content' => number_format($row->total,2)
            ),
            
        );
        $message = array(
            'subject' => 'Milin Thank you for resgister',
            'from_email' => 'info@milin.com',
            'text' => '',
            'from_name' => 'Milin ',
            'to' => array(
                array(
                    'email' => $row->email,
                    'name' => $row->name." ".$row->lastname,
                    'type' => 'to'
                )
            )
        );
        $async = false;
        $ip_pool = 'Main Pool';

        $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);

        $this->template->build('checkout_complete',$data);
    }
    function checkout_payment($order_id){

        $sql = "select * from  orders where id ='{$order_id}'";
        $qry = $this->db->query($sql);
        $row = $qry->row();

        $data['order_id'] = $row->id;

        $this->template->build('checkout_payment',$data);
    }
    function confirm_order($order_id){
        //select query
        $sql = "select * from  orders where id ='{$order_id}'";
        $qry = $this->db->query($sql);
        if($qry){
            $this->db->where('id',$order_id);
            $this->db->update('orders',array('user_confirm' => 1));
            redirect('shop/checkout_payment/'.$order_id);

        }else{
            show_404();
        }

    }
    function lang_switch($data){
        setcookie ('lang', $data , time()+2678400 ,"/");
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }

}