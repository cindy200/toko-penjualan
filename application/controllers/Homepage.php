<?php
defind('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller{

    public funtion __construct()
    {
        parent::__construct();
       //codeigniter : Write Less Do More
    }

    funtion index()
    {
        $data['judul']="Toko Online";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }


}