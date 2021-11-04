<?php
defind('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller{

    public funtion __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form-validation');
    }

public  funtion index()
    {
        $data['judul']="Barang";
        $data['barang']=$this->Barang_model->getAllBarang();
        if( $this->input->post('keyword')){
            $data['barang']=$this->Barang_model->cariDataBarang();
        }
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barang/index');
        $this->load->view('templates/footer');
       
    }

public funtion tambah()
{
    $data['judul']="Tanbah Data Barang";

    $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required',);
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required',);
    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric',);
    $this->form_validation->set_rules('stok', 'Stok', 'required|numeric',);
    if ($this->form_validation->run() == FALSE)
             {
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar');
                $this->load->view('barang/tambah');
                $this->load->view('templates/footer');
             }
             else
             {
                 $this->Barang_model->tambahDataBarang();
                 $this->session->set_flashdata('flash','Ditambahkan');
                 redirect('barang');
             }

    }

    public function hapus($id){
        $this->Barang_model->hapusDataBarang($id);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('barang');

    }
    public function detail($id){
        $data['judul']="Detail Barang";
        $data['barang']=$this->Barang_model->getBarangById($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barang/detail',$data);
        $this->load->view('templates/footer');
    
    }

    public function ubah($id){
        $data['judul']="Ubah Data Barang";
        $data['barang']=$this->Barang_model->getBarangById($id);
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required',);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required',);
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric',);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric',);
        if ($this->form_validation->run() == FALSE)
                 {
                    $this->load->view('templates/header',$data);
                    $this->load->view('templates/sidebar');
                    $this->load->view('templates/topbar');
                    $this->load->view('barang/ubah',$data);
                    $this->load->view('templates/footer');
                 }
                 else
                 {
                     $this->Barang_model->ubahDataBarang();
                     $this->session->set_flashdata('flash','Diubah');
                     redirect('barang');
                 }   

    
    }

}