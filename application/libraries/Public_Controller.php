<?php
class Public_Controller extends Master_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->template->set_theme('admin');
        $this->template->set_layout('index');
        
    }

}
?>