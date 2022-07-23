<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hewan extends My_Controller {

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

        $hewan = $this->db->query("SELECT*FROM hewan WHERE deleted=0");

         $data=array(
            "hewanku"=>$hewan->result(),
        );
		 $this->Mypage('isi/adm/hewan',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_hewan', 'nm_hewan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/hewan');
        }else{
            $data=array(
                "nm_hewan"=>$_POST['nm_hewan'],
                "deleted" => 0
            );
            $this->db->insert('hewan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/hewan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_hewan', 'nm_hewan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/hewan');
        }else{
            $data=array(
                "nm_hewan"=>$_POST['nm_hewan']
            );
            $this->db->where('id_hewan', $_POST['id_hewan'] );
            $this->db->update('hewan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/hewan');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/hewan');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_hewan', $id);
            $this->db->update('hewan',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/hewan');
        }
    }


	
}
