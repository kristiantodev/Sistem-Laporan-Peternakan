<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends My_Controller {

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

        if(isset($_POST['bulan']) )
        {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $id_kecamatan= $_POST['id_kecamatan'];
            $populasi = $this->db->query("SELECT*FROM populasi LEFT JOIN 
            desa ON desa.id_desa=populasi.id_desa WHERE populasi.admin_acc=1");
            $populasiDetail = $this->db->query("SELECT desa.nm_desa, 
                SUM(populasi_detail.hewan_1) as hewan_1, 
                SUM(populasi_detail.hewan_2) as hewan_2,
                SUM(populasi_detail.hewan_3) as hewan_3,
                SUM(populasi_detail.hewan_4) as hewan_4,
                SUM(populasi_detail.hewan_5) as hewan_5,
                SUM(populasi_detail.hewan_6) as hewan_6,
                SUM(populasi_detail.hewan_7) as hewan_7,
                SUM(populasi_detail.hewan_8) as hewan_8,
                SUM(populasi_detail.hewan_9) as hewan_9,
                SUM(populasi_detail.hewan_10) as hewan_10,
                SUM(populasi_detail.hewan_11) as hewan_11 FROM populasi_detail
                LEFT JOIN populasi ON populasi.id_populasi=populasi_detail.id_populasi
                LEFT JOIN desa ON desa.id_desa=populasi.id_desa
                LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
                WHERE desa.id_kecamatan='$id_kecamatan' AND bulan='$bulan' AND tahun='$tahun' AND populasi.acc_petugas=1
                GROUP BY desa.nm_desa");
        }else{
            $bulan = "";
            $tahun = "";
            $id_kecamatan=0;
            $populasiDetail = $this->db->query("SELECT desa.nm_desa, 
                SUM(populasi_detail.hewan_1) as hewan_1, 
                SUM(populasi_detail.hewan_2) as hewan_2,
                SUM(populasi_detail.hewan_3) as hewan_3,
                SUM(populasi_detail.hewan_4) as hewan_4,
                SUM(populasi_detail.hewan_5) as hewan_5,
                SUM(populasi_detail.hewan_6) as hewan_6,
                SUM(populasi_detail.hewan_7) as hewan_7,
                SUM(populasi_detail.hewan_8) as hewan_8,
                SUM(populasi_detail.hewan_9) as hewan_9,
                SUM(populasi_detail.hewan_10) as hewan_10,
                SUM(populasi_detail.hewan_11) as hewan_11 FROM populasi_detail
                LEFT JOIN populasi ON populasi.id_populasi=populasi_detail.id_populasi
                LEFT JOIN desa ON desa.id_desa=populasi.id_desa
                LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
                WHERE populasi.acc_petugas=1
                GROUP BY desa.nm_desa");
        }

        $kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");

         $data=array(
            "populasiDetail"=>$populasiDetail->result(),
            "kecamatanList"=>$kecamatan->result(),
            "bulanShow"=>$bulan,
            "tahunShow"=>$tahun,
            "kecamatanShow"=>$id_kecamatan
        );
         $this->Mypage('isi/adm/report_populasi',$data);

    }


    public function kabupaten()
    {

        if(isset($_POST['bulan']) )
        {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $populasi = $this->db->query("SELECT*FROM populasi LEFT JOIN 
            desa ON desa.id_desa=populasi.id_desa WHERE populasi.admin_acc=1");
            $populasiDetail = $this->db->query("SELECT kecamatan.nm_kecamatan, 
                SUM(populasi_detail.hewan_1) as hewan_1, 
                SUM(populasi_detail.hewan_2) as hewan_2,
                SUM(populasi_detail.hewan_3) as hewan_3,
                SUM(populasi_detail.hewan_4) as hewan_4,
                SUM(populasi_detail.hewan_5) as hewan_5,
                SUM(populasi_detail.hewan_6) as hewan_6,
                SUM(populasi_detail.hewan_7) as hewan_7,
                SUM(populasi_detail.hewan_8) as hewan_8,
                SUM(populasi_detail.hewan_9) as hewan_9,
                SUM(populasi_detail.hewan_10) as hewan_10,
                SUM(populasi_detail.hewan_11) as hewan_11 FROM populasi_detail
                LEFT JOIN populasi ON populasi.id_populasi=populasi_detail.id_populasi
                LEFT JOIN desa ON desa.id_desa=populasi.id_desa
                LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
                WHERE bulan='$bulan' AND tahun='$tahun' AND populasi.acc_petugas=1
                GROUP BY kecamatan.nm_kecamatan");
        }else{
            $bulan = "";
            $tahun = "";
            $populasiDetail = $this->db->query("SELECT kecamatan.nm_kecamatan, 
                SUM(populasi_detail.hewan_1) as hewan_1, 
                SUM(populasi_detail.hewan_2) as hewan_2,
                SUM(populasi_detail.hewan_3) as hewan_3,
                SUM(populasi_detail.hewan_4) as hewan_4,
                SUM(populasi_detail.hewan_5) as hewan_5,
                SUM(populasi_detail.hewan_6) as hewan_6,
                SUM(populasi_detail.hewan_7) as hewan_7,
                SUM(populasi_detail.hewan_8) as hewan_8,
                SUM(populasi_detail.hewan_9) as hewan_9,
                SUM(populasi_detail.hewan_10) as hewan_10,
                SUM(populasi_detail.hewan_11) as hewan_11 FROM populasi_detail
                LEFT JOIN populasi ON populasi.id_populasi=populasi_detail.id_populasi
                LEFT JOIN desa ON desa.id_desa=populasi.id_desa
                LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
                WHERE populasi.acc_petugas=1
                GROUP BY kecamatan.nm_kecamatan");
        }

        $kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");

         $data=array(
            "populasiDetail"=>$populasiDetail->result(),
            "kecamatanList"=>$kecamatan->result(),
            "bulanShow"=>$bulan,
            "tahunShow"=>$tahun,
        );
         $this->Mypage('isi/adm/report_populasi2',$data);

    }

    public function klasifikasi()
    {

        if(isset($_POST['jenis_klasifikasi']) )
        {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $jenisKlasifikasi=$_POST['jenis_klasifikasi'];
            if($jenisKlasifikasi == 'pemilik_ternak.nm_pemilik'){
                $remarkKlasifikasi="Pemilik Ternak";
            }else if($jenisKlasifikasi == 'populasi.status_kepemilikan'){
                $remarkKlasifikasi="Kepemilikan";
            }else if($jenisKlasifikasi == 'populasi_detail.umur_hewan'){
                $remarkKlasifikasi="Umur Hewan";
            }else if($jenisKlasifikasi == 'populasi_detail.jk_hewan'){
                $remarkKlasifikasi="Jenis Kelamin";
            }
            $populasi = $this->db->query("SELECT*FROM populasi LEFT JOIN 
            desa ON desa.id_desa=populasi.id_desa WHERE populasi.admin_acc=1");

            $query = "SELECT ".$jenisKlasifikasi." as klasifikasiName, 
            SUM(populasi_detail.hewan_1) as hewan_1, 
            SUM(populasi_detail.hewan_2) as hewan_2,
            SUM(populasi_detail.hewan_3) as hewan_3,
            SUM(populasi_detail.hewan_4) as hewan_4,
            SUM(populasi_detail.hewan_5) as hewan_5,
            SUM(populasi_detail.hewan_6) as hewan_6,
            SUM(populasi_detail.hewan_7) as hewan_7,
            SUM(populasi_detail.hewan_8) as hewan_8,
            SUM(populasi_detail.hewan_9) as hewan_9,
            SUM(populasi_detail.hewan_10) as hewan_10,
            SUM(populasi_detail.hewan_11) as hewan_11 FROM populasi_detail
            LEFT JOIN populasi ON populasi.id_populasi=populasi_detail.id_populasi
            LEFT JOIN desa ON desa.id_desa=populasi.id_desa
            LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
            LEFT JOIN pemilik_ternak ON populasi.id_pemilik=pemilik_ternak.id_pemilik
            WHERE bulan='$bulan' AND tahun='$tahun' AND populasi.acc_petugas=1
            GROUP BY ".$jenisKlasifikasi;

            $populasiDetail = $this->db->query($query);
        }else{
            $bulan = "XX";
            $tahun = "XX";
            $remarkKlasifikasi="";
            $populasiDetail = $this->db->query("SELECT kecamatan.nm_kecamatan, 
                SUM(populasi_detail.hewan_1) as hewan_1, 
                SUM(populasi_detail.hewan_2) as hewan_2,
                SUM(populasi_detail.hewan_3) as hewan_3,
                SUM(populasi_detail.hewan_4) as hewan_4,
                SUM(populasi_detail.hewan_5) as hewan_5,
                SUM(populasi_detail.hewan_6) as hewan_6,
                SUM(populasi_detail.hewan_7) as hewan_7,
                SUM(populasi_detail.hewan_8) as hewan_8,
                SUM(populasi_detail.hewan_9) as hewan_9,
                SUM(populasi_detail.hewan_10) as hewan_10,
                SUM(populasi_detail.hewan_11) as hewan_11 FROM populasi_detail
                LEFT JOIN populasi ON populasi.id_populasi=populasi_detail.id_populasi
                LEFT JOIN desa ON desa.id_desa=populasi.id_desa
                LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
                WHERE populasi.acc_petugas=1 AND bulan='$bulan' AND tahun='$tahun'
                GROUP BY kecamatan.nm_kecamatan");
        }

        $kecamatan = $this->db->query("SELECT*FROM kecamatan WHERE deleted=0");

         $data=array(
            "populasiDetail"=>$populasiDetail->result(),
            "kecamatanList"=>$kecamatan->result(),
            "bulanShow"=>$bulan,
            "tahunShow"=>$tahun,
            "jenisKlasifikasi"=>$remarkKlasifikasi
        );
         $this->Mypage('isi/adm/klasifikasi',$data);

    }

	
}
