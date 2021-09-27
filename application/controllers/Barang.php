<?php
defind('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller{

    public funtion __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }

    funtion index()
    {
        $data['judul']="Toko Online";
        $data['barang']=$this->Barang_model->getAllBarang();
        $this->load->view('templates/header',$data);
        $this->load->view('barang/index');
        $this->load->view('templates/footer');
       
    }

}