<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Populasi extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Petugas Vaksin"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{
        $populasi = $this->db->query("SELECT*FROM populasi LEFT JOIN 
            desa ON desa.id_desa=populasi.id_desa
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan WHERE populasi.kep_bidang_acc=1 ORDER BY populasi.kep_bidang_acc");
        $populasiDetail = $this->db->query("SELECT*FROM populasi_detail");

         $data=array(
            "populasiList"=>$populasi->result(),
            "populasiDetail"=>$populasiDetail->result(),
        );
		 $this->Mypage('isi/petugas/populasi',$data);
	}


    public function terima()
    {
        $this->form_validation->set_rules('id_populasi', 'id_populasi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('petugas/populasi');
        }else{
            $data=array(
                "acc_petugas"=>1,
            );
            $this->db->where('id_populasi', $_POST['id_populasi'] );
            $this->db->update('populasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('petugas/populasi');
        }
    }


public function tolak($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('petugas/populasi');
        }else{
            $data=array(
                "acc_petugas"=> 2
            );
            $this->db->where('id_populasi', $id);
            $this->db->update('populasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('petugas/populasi');
        }
    }

	
}
