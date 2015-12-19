<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Public_Controller {



    public function __construct()
    {
        parent::__construct();


    }

    function search_product($text){

        $sql = "select
                  product.name as name,
                  product_unit.product_unit_id,
                  product_unit.code,
                  product_unit.price,
                  product_unit.image

                from product_unit
                left join product on product_unit.product_id = product.product_id
                where product_unit.name like '%{$text}%' or product_unit.code like '%{$text}%'";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        header('Content-type: application/json');
        echo json_encode($result);

    }
    function search_member($text){

        $sql = "select
                  member.member_id,
                  member.name,
                  member.lastname,
                  member.email,
                  member.telephone,
                  member.member_id,
                  member_address.address

                from member
                left join member_address on member.member_id = member_address.member_id
                where
                (member.name like '%{$text}%' or member.email like '%{$text}%'  or member.telephone like '%{$text}%' or member.email like '%{$text}%') and (member_address.current=1)";
        $qry = $this->db->query($sql);
        $result = $qry->result();

        header('Content-type: application/json');
        echo json_encode($result);

    }
}