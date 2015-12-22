<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewer extends Public_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('viewer');
        $this->template->set_layout('index');

    }
    function page($code,$chapter,$lang="en"){

        $sql = "select * from book where code = '{$code}' and lang = '{$lang}'";
        $qry = $this->db->query($sql);
        $row = $qry->row();

        $sql = "select * from chapter where chapter_number = '".strip_tags($chapter)."' and book_id = '{$row->id}'  and lang = '{$lang}'";
        $qry = $this->db->query($sql);
        $result = $qry->result();
        $data['data'] = $result;
        $this->template->build('page',$data);
    }
}