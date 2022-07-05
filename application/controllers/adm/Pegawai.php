<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends My_Controller {

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

        $pegawai = $this->db->query("SELECT*FROM pegawai 
            LEFT JOIN user ON user.id_user = pegawai.id_user
            LEFT JOIN desa ON pegawai.id_desa = desa.id_desa
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan
            WHERE pegawai.deleted=0");
        $desa = $this->db->query("SELECT*FROM desa 
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan WHERE desa.deleted=0");

         $data=array(
            "pegawaiList"=>$pegawai->result(),
            "desaList"=>$desa->result(),
        );
		 $this->Mypage('isi/adm/pegawai',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_pegawai', 'nm_pegawai', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pegawai');
        }else{

            $userPost = $_POST['nip'];
            $cekQuery = $this->db->query("SELECT * FROM pegawai WHERE nip = '$userPost' AND deleted=0")->result_array();
            if(count($cekQuery) >= 1){
                   $this->session->set_flashdata('sukses',"gagalNip");
                   redirect('adm/pegawai');
            }

            $id = uniqid();
            $config['upload_path']          = './assets/images/users/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
              if ($this->upload->do_upload('foto')) {
                 $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/pegawai');
                  }

              }else{
                $img = '1.jpg';
              }

            $data=array(
                "id_user" => $id,
                "nm_pegawai"=>$_POST['nm_pegawai'],
                "nip"=>$_POST['nip'],
                "jabatan"=>$_POST['jabatan'],
                "bidang"=>$_POST['bidang'],
                "id_desa"=>$_POST['id_desa'],
                "deleted" => 0
            );
            $this->db->insert('pegawai',$data);

            $pass = password_hash ($_POST['nip'], PASSWORD_DEFAULT);
            $data=array(
                "id_user" => $id,
                "username"=>$_POST['nip'],
                "password"=>$pass,
                "nm_user"=>$_POST['nm_pegawai'],
                "level"=>"Pegawai",
                "foto"=>$img,
                "id_desa"=>$_POST['id_desa'],
            );
            $this->db->insert('user',$data);

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pegawai');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pegawai');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/users/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
                 if ($this->upload->do_upload('foto')) {

                 $img = $this->upload->data('file_name');

                 if($_POST['old_image'] != '1.jpg'){
                    $path = './assets/images/users/'.$_POST['old_image'];
                    chmod($path, 0777);
                    unlink($path);
                 }

                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/pegawai');
                  }

              }else{
                $img = $_POST['old_image'];
              }

            $data=array(
                "nm_pegawai"=>$_POST['nm_pegawai'],
                "jabatan"=>$_POST['jabatan'],
                "bidang"=>$_POST['bidang']
            );
            $this->db->where('id_user', $_POST['id_pegawai'] );
            $this->db->update('pegawai',$data);

            $dataUser=array(
                "nm_user"=>$_POST['nm_pegawai'],
                "foto"=>$img
            );
            $this->db->where('id_user', $_POST['id_pegawai'] );
            $this->db->update('user',$dataUser);

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pegawai');
        }
    }

   public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/alumni');
        }else{

             $dataUser=array(
                "deleted"=>1,
            );
            $this->db->where('id_user', $id);
            $this->db->update('pegawai',$dataUser);

            $this->session->set_flashdata('sukses',"hapus");
            $this->db->where('id_user', $id);
            $this->db->delete('user');

            redirect('adm/user');
        }
    }


	
}
