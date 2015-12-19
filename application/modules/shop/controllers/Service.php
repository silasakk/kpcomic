<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Public_Controller
{


    public function __construct()
    {
        parent::__construct();


    }
    function preparecart() {


        $products = ($_POST['products']);


        foreach ($products as $key => $value){
            if ($value['qty'] == 0) {
                unset($products[$key]);
            }
        }
        $prod = json_encode($products, true);

        setcookie ('products', $prod , time()+2678400 , "/");
        header('Content-Type: application/json');
        echo $prod;
        exit;
    }
    function add_cart() {
        $info = strip_tags($_POST['item_code']);
        //select query
        $sql = "select * from product_unit where product_unit_id = '" . strip_tags($info) . "' ";
        $qry = $this->db->query($sql);
        $row = $qry->row();

        $sql = "select * from product where product_id = '" . $row->product_id . "' ";
        $qry = $this->db->query($sql);
        $main = $qry->row();


        if(!isset($_COOKIE['products'])){
            $item = array(

                '0' => array(
                    'id' => $row->product_unit_id,
                    'icon' => './uploads/'.$main->image,
                    'name' => $main->name,
                    'code' => $row->code,
                    'size' => $row->size,
                    'qty' => 1,
                    'color' => $row->color,
                    'price' => ($row->sale_price)?$row->sale_price : $row->price
                )
            );
            $prod = json_encode($item, true);
            setcookie ('products', $prod , time()+2678400 , "/");

        }else{



            $prod = $_COOKIE['products'];

            $prod = stripslashes($prod);

            $prod = json_decode($prod,true);

            $key = $this->findKey($prod, 'id', $row->product_unit_id);

            if ($key === null) {



                $item = array(
                    'id' => $row->product_unit_id,
                    'icon' => './uploads/'.$main->image,
                    'name' => $main->name,
                    'size' => $row->size,
                    'qty' => 1,
                    'color' => $row->color,
                    'code' => $row->code,
                    'price' => ($row->sale_price)?$row->sale_price : $row->price
                );
                $prod[] = $item;

                $prod = json_encode($prod);

                setcookie ('products', $prod , time()+2678400 , "/");

            } else {

                $prod[$key]['qty'] = $prod[$key]['qty']+1;

                $prod = json_encode($prod);

                setcookie ('products', $prod , time()+2678400 , "/");


            }



        }

        header('Content-Type: application/json');
        echo $prod;
        exit;

    }

    function remove_cart() {


        $prod = $_COOKIE['products'];

        $prod = stripslashes($prod);

        $prod = json_decode($prod,true);

        $key = $this->findKey($prod, 'id', $_POST['item_code']);

        unset($prod[$key]);

        $prod = json_encode($prod);

        setcookie ('products', $prod , time()+2678400 ,"/");

        header('Content-Type: application/json');
        echo $prod;
        exit;

    }

    function load_cart() {

        $prod = $_COOKIE['products'];

        $prod = stripslashes($prod);

        $prod = json_decode($prod,true);

        $prod = json_encode($prod);

        header('Content-Type: application/json');
        echo $prod;
        exit;

    }


    function getcode() {
        $main_product = strip_tags($_POST['main_product']);
        $color = strip_tags($_POST['color']);
        $size = strip_tags($_POST['size']);

        $sql = "select * from product_unit where product_id = '{$main_product}' and color ='{$color}' and size = '{$size}' ";
        $qry = $this->db->query($sql);

        header('Content-Type: application/json');
        if($qry->num_rows()){
            $row = $qry->row();
            echo $row->product_unit_id;
        }else{
            echo 0;
        }

        exit;

    }


    //search duplicate
    public function findKey(array $array, $wantedKey, $match) {
        foreach ($array as $key => $value){
            if ($value[$wantedKey] == $match) {
                return $key;
            }
        }
    }
    function facebook_login(){
        $user = $_POST['data'];
        //check email for register
        $sql = "select * from member where email = '{$user['email']}' ";
        $qry = $this->db->query($sql);
        $result = $qry->row();
        if($result){
            $this->session->set_userdata('user_id',$result->id);

        }else{
            $data = array(
                'name' => $user['first_name'],
                'lastname' => $user['last_name'],
                'email' => $user['email'],
                'facebook_id' => $user['id'],
                'password' => md5($user['id']),
                'level' => 'customers',
                'created_at' => date("Y-m-d H:i:s")
            );
            $insert_id = $this->db->insert('member',$data);

            require_once APPPATH.'libraries/mandrill-api-php/src/Mandrill.php'; //Not required with Composer

            $mandrill = new Mandrill('2ICrBUfiFK85I4TEoVhTYQ');
            $template_name = 'Milin Registered';
            $template_content = array(
                array(
                    'name' => 'email',
                    'content' => $data['email']
                ),
                array(
                    'name' => 'fullname',
                    'content' => $data['name']." ".$data['lastname']
                ),
                array(
                    'name' => 'telephone',
                    'content' => 'Connect with Facebook'
                )
            );
            $message = array(
                'subject' => 'Milin Thank you for resgister',
                'from_email' => 'info@milin.com',
                'text' => 'now you can shopping in milin.com',
                'from_name' => 'Milin ',
                'to' => array(
                    array(
                        'email' => $data['email'],
                        'name' => $data['name']." ".$data['lastname'],
                        'type' => 'to'
                    )
                )
            );
            $async = false;
            $ip_pool = 'Main Pool';
            $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);

            $this->session->set_userdata('user_id',$insert_id);
        }

        header('Content-Type: application/json');
        echo 1;
        exit;
    }



}