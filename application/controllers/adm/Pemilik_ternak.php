<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik_ternak extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{

        $pemilik = $this->db->query("SELECT*FROM pemilik_ternak
        LEFT JOIN desa ON desa.id_desa=pemilik_ternak.id_desa 
        LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan
        WHERE pemilik_ternak.deleted=0");
        $desa = $this->db->query("SELECT*FROM desa 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan WHERE desa.deleted=0");

         $data=array(
            "pemilikList"=>$pemilik->result(),
            "desaList"=>$desa->result(),
        );
		 $this->Mypage('isi/adm/pemilik_ternak',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_pemilik', 'nm_pemilik', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pemilik_ternak');
        }else{
            $data=array(
                "nm_pemilik"=>$_POST['nm_pemilik'],
                "umur"=>$_POST['umur'],
                "nik"=>$_POST['nik'],
                "hp"=>$_POST['hp'],
                "alamat"=>$_POST['alamat'],
                "pekerjaan"=>$_POST['pekerjaan'],
                "id_desa"=>$_POST['id_desa'],
                "deleted" => 0
            );
            $this->db->insert('pemilik_ternak',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pemilik_ternak');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_pemilik', 'nm_pemilik', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pemilik_ternak');
        }else{
            $data=array(
                "nm_pemilik"=>$_POST['nm_pemilik'],
                "umur"=>$_POST['umur'],
                "nik"=>$_POST['nik'],
                "hp"=>$_POST['hp'],
                "alamat"=>$_POST['alamat'],
                "pekerjaan"=>$_POST['pekerjaan'],
                "id_desa"=>$_POST['id_desa'],
            );
            $this->db->where('id_pemilik', $_POST['id_pemilik'] );
            $this->db->update('pemilik_ternak',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pemilik_ternak');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/pemilik');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_pemilik', $id);
            $this->db->update('pemilik_ternak',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/pemilik_ternak');
        }
    }


	
}
