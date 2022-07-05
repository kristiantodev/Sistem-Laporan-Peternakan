<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaksin extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Pegawai"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{
        $idDesa = $this->session->userdata('id_desa');

        $pemilik = $this->db->query("SELECT*FROM pemilik_ternak
        LEFT JOIN desa ON desa.id_desa=pemilik_ternak.id_desa 
        LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan
        WHERE pemilik_ternak.deleted=0 AND pemilik_ternak.id_desa='$idDesa'");

        $vaksin = $this->db->query("SELECT*FROM vaksin
        LEFT JOIN hewan ON hewan.id_hewan=vaksin.id_hewan 
        WHERE vaksin.deleted=0");
       
       $hewan = $this->db->query("SELECT*FROM hewan");

         $data=array(
            "pemilikList"=>$pemilik->result(),
            "vaksinList"=>$vaksin->result(),
            "hewanList"=>$hewan->result(),
        );
		 $this->Mypage('isi/pegawai/vaksin',$data);
	}


    public function list()
    {
        $idDesa = $this->session->userdata('id_desa');

        $vaksin = $this->db->query("SELECT*FROM vaksin
        LEFT JOIN hewan ON hewan.id_hewan=vaksin.id_hewan 
        LEFT JOIN pemilik_ternak ON vaksin.id_pemilik = pemilik_ternak.id_pemilik
        LEFT JOIN desa ON desa.id_desa=pemilik_ternak.id_desa 
        LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan
        WHERE vaksin.deleted=0 AND pemilik_ternak.id_desa='$idDesa'");
       
         $data=array(
            "vaksinList"=>$vaksin->result(),
        );
         $this->Mypage('isi/pegawai/vaksin_list',$data);
    }


	
      public function add()
    {
        $this->form_validation->set_rules('id_pemilik', 'id_pemilik', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('pegawai/vaksin');
        }else{
            $data=array(
                "id_pemilik"=>$_POST['id_pemilik'],
                "id_hewan"=>$_POST['id_hewan'],
                "jenis_vaksin"=>$_POST['jenis_vaksin'],
                "dokter"=>$_POST['dokter'],
                "tgl_vaksin"=>$_POST['tgl_vaksin'],
                "keterangan"=>$_POST['keterangan'],
                "deleted" => 0
            );
            $this->db->insert('vaksin',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('pegawai/vaksin');
        }
    }



	
}
