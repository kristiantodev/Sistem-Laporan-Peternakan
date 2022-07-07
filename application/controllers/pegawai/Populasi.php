<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Populasi extends My_Controller {

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
        $idpopulasi = $this->session->userdata('id_desa');
        $populasi = $this->db->query("SELECT*FROM populasi WHERE id_desa='$idpopulasi'");
        $populasiDetail = $this->db->query("SELECT*FROM populasi_detail");
        $pemilik = $this->db->query("SELECT*FROM pemilik_ternak
        LEFT JOIN desa ON desa.id_desa=pemilik_ternak.id_desa 
        LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan
        WHERE pemilik_ternak.deleted=0 AND pemilik_ternak.id_desa='$idpopulasi'");

         $data=array(
            "populasiList"=>$populasi->result(),
            "populasiDetail"=>$populasiDetail->result(),
            "pemilikList"=>$pemilik->result(),
        );
		 $this->Mypage('isi/pegawai/populasi',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_populasi', 'nm_populasi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('pegawai/populasi');
        }else{

            $id = uniqid();
            $config['upload_path']          = './assets/images/populasi/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $uploadPdf = $_FILES['file']['name'];

            if($uploadPdf){
              if ($this->upload->do_upload('file')) {
                 $pdfFile = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('pegawai/populasi');
                  }

              }else{
                $pdfFile = 'default.png';
              }

              $i=1;
            while (isset($_POST['hewan1_'.$i])) {

                 $dataPopulasi=array(
                     "id_populasi"=>$id,
                     "umur_hewan"=>$_POST['umur_hewan_'.$i],
                     "jk_hewan"=>$_POST['jk_hewan_'.$i],
                     "hewan_1"=>$_POST['hewan1_'.$i],
                     "hewan_2"=>$_POST['hewan2_'.$i],
                     "hewan_3"=>$_POST['hewan3_'.$i],
                     "hewan_4"=>$_POST['hewan4_'.$i],
                     "hewan_5"=>$_POST['hewan5_'.$i],
                     "hewan_6"=>$_POST['hewan6_'.$i],
                     "hewan_7"=>$_POST['hewan7_'.$i],
                     "hewan_8"=>$_POST['hewan8_'.$i],
                     "hewan_9"=>$_POST['hewan9_'.$i],
                     "hewan_10"=>$_POST['hewan10_'.$i],
                     "hewan_11"=>$_POST['hewan11_'.$i],
                 );

                 $this->db->insert('populasi_detail',$dataPopulasi);

                 $i++;
            }

            $data=array(
                "id_populasi"=>$id,
                "nm_populasi"=>$_POST['nm_populasi'],
                "bulan"=>$_POST['bulan'],
                "tahun"=>$_POST['tahun'],
                "id_desa"=>$this->session->userdata('id_desa'),
                "file" => $pdfFile,
                "is_final"=>0,
                "admin_acc"=>0,
                "kep_bidang_acc"=>0,
                "id_pemilik"=>$_POST['id_pemilik'],
                "status_kepemilikan"=>$_POST['status_kepemilikan']
            );
            $this->db->insert('populasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('pegawai/populasi');
        }
    }


	
}
