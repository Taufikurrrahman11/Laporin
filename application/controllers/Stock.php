<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        
    }

    public function stock_in_data(){
        $this->template->load('template', 'transaction/stock_in/stock_in_data');
    }
    public function stock_in_add(){
        $this->template->load('template', 'transaction/stock_in/stock_in_form');
    }

}