<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends My_Controller {

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

        $desa = $this->db->query("SELECT*FROM desa 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan WHERE desa.deleted=0");
        $kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");

         $data=array(
            "desaku"=>$desa->result(),
            "kecamatanList"=>$kecamatan->result()
        );
		 $this->Mypage('isi/adm/desa',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_desa', 'nm_desa', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/desa');
        }else{
            $data=array(
                "nm_desa"=>$_POST['nm_desa'],
                "id_kecamatan"=>$_POST['id_kecamatan'],
                "deleted" => 0
            );
            $this->db->insert('desa',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/desa');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_desa', 'nm_desa', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/desa');
        }else{
            $data=array(
                "nm_desa"=>$_POST['nm_desa'],
                "id_kecamatan"=>$_POST['id_kecamatan']
            );
            $this->db->where('id_desa', $_POST['id_desa'] );
            $this->db->update('desa',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/desa');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/desa');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_desa', $id);
            $this->db->update('desa',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/desa');
        }
    }


	
}
