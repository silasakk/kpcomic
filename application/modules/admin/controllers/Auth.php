<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Public_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->template->set_theme('admin');


    }

    public function login()
    {
        $this->template->set_layout('login');
        $this->template->build('auth/login');
    }





}
