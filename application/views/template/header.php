<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
  <!--plugins-->
  <link href="<?php echo base_url();?>assets/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url();?>assets/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/assets/css/app.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/assets/css/icons.css" rel="stylesheet">
  <!-- Theme Style CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/dark-theme.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/semi-dark.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/header-colors.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/header-colors.css" />
  <title>Sistem Peternakan Kecamatan Indralaya</title>
</head>

<body class="bg-theme bg-theme2">
  <!--wrapper-->
  <div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <img src="<?php echo base_url();?>assets/images/logo.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <h4 class="logo-text">Peternakan</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li class="menu-label">Menu</li>

    <?php if($this->session->userdata('level') == "Administrator"){ ?>
        <li>
          <a href="<?php echo site_url();?>adm/dashboard">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-book'></i>
            </div>
            <div class="menu-title">Data Master</div>
          </a>
          <ul>
            <li> <a href="<?php echo site_url();?>adm/kecamatan"><i class="bx bx-right-arrow-alt"></i>Kecamatan</a>
            </li>
            <li> <a href="<?php echo site_url();?>adm/desa"><i class="bx bx-right-arrow-alt"></i>Desa</a>
            </li>
            <li> <a href="<?php echo site_url();?>adm/pegawai"><i class="bx bx-right-arrow-alt"></i>Pegawai</a>
            </li>
            <li> <a href="<?php echo site_url();?>adm/pemilik_ternak"><i class="bx bx-right-arrow-alt"></i>Pemilik Ternak</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-book-open'></i>
            </div>
            <div class="menu-title">Data Vaksin Ternak</div>
          </a>
          <ul>
            <li> <a href="<?php echo site_url();?>adm/vaksin"><i class="bx bx-right-arrow-alt"></i>Tambah Ternak Vaksin</a>
            </li>
            <li> <a href="<?php echo site_url();?>adm/vaksin/list"><i class="bx bx-right-arrow-alt"></i>Rekap Data Vaksin</a>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url();?>adm/populasi">
            <div class="parent-icon"><i class='bx bx-folder'></i>
            </div>
            <div class="menu-title">Populasi</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-folder-open'></i>
            </div>
            <div class="menu-title">Laporan Populasi</div>
          </a>
          <ul>
            <li> <a href="<?php echo site_url();?>adm/laporan/kabupaten"><i class="bx bx-right-arrow-alt"></i>Kabupaten/Kecamatan</a>
            </li>
            <li> <a href="<?php echo site_url();?>adm/laporan"><i class="bx bx-right-arrow-alt"></i>Kecamatan/Desa</a>
            <li> <a href="<?php echo site_url();?>adm/laporan/klasifikasi"><i class="bx bx-right-arrow-alt"></i>Klasifikasi</a></li>
         
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url();?>adm/user">
            <div class="parent-icon"><i class='bx bx-user'></i>
            </div>
            <div class="menu-title">Pengguna</div>
          </a>
        </li>

<?php }else if($this->session->userdata('level') == "Admin Desa"){ ?>
   <li>
          <a href="<?php echo site_url();?>desa/dashboard">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
  <?php }else if($this->session->userdata('level') == "Kepala Dinas"){ ?>
      <li>
          <a href="<?php echo site_url();?>kepala_dinas/dashboard">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-book-open'></i>
            </div>
            <div class="menu-title">Laporan Populasi</div>
          </a>
          <ul>
            <li> <a href="<?php echo site_url();?>kepala_dinas/populasi/kabupaten"><i class="bx bx-right-arrow-alt"></i>Kabupaten/Kecamatan</a>
            </li>
            <li> <a href="<?php echo site_url();?>kepala_dinas/populasi"><i class="bx bx-right-arrow-alt"></i>Kecamatan/Desa</a></li>
            <li> <a href="<?php echo site_url();?>kepala_dinas/populasi/klasifikasi"><i class="bx bx-right-arrow-alt"></i>Klasifikasi</a></li>
          </ul>
        </li>
        
    <?php }else if($this->session->userdata('level') == "Kepala Bidang"){ ?>
          <li>
          <a href="<?php echo site_url();?>kepala_bidang/dashboard">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url();?>kepala_bidang/populasi">
            <div class="parent-icon"><i class='bx bx-folder'></i>
            </div>
            <div class="menu-title">Populasi</div>
          </a>
        </li>
    <?php }else if($this->session->userdata('level') == "Pegawai"){ ?>
          <li>
          <a href="<?php echo site_url();?>pegawai/dashboard">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-book-open'></i>
            </div>
            <div class="menu-title">Data Vaksin Ternak</div>
          </a>
          <ul>
            <li> <a href="<?php echo site_url();?>pegawai/vaksin"><i class="bx bx-right-arrow-alt"></i>Tambah Ternak Vaksin</a>
            </li>
            <li> <a href="<?php echo site_url();?>pegawai/vaksin/list"><i class="bx bx-right-arrow-alt"></i>Rekap Data Vaksin</a>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url();?>pegawai/populasi">
            <div class="parent-icon"><i class='bx bx-folder'></i>
            </div>
            <div class="menu-title">Populasi</div>
          </a>
        </li>
    <?php } ?>

      </ul>
      <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
      <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
          <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
          </div>
          
          <div class="top-menu ms-auto">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item dropdown dropdown-large">
                
                <div class="dropdown-menu dropdown-menu-end">
                  
                  <div class="header-notifications-list">
                    
                    
                  </div>
                  
                </div>
              </li>
              <li class="nav-item dropdown dropdown-large">
                
                <div class="dropdown-menu dropdown-menu-end">
                  
                  <div class="header-message-list">
                    
                  </div>
                  
                </div>
              </li>
            </ul>
          </div>
          <div class="user-box dropdown">
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" class="user-img" alt="user avatar">
              <div class="user-info ps-3">
                <p class="user-name mb-0"><?=$this->session->userdata('nm_user') ?></p>
                <p class="designattion mb-0"><?=$this->session->userdata('level') ?>
                  
                  <?php 
                  $idDesaShow=$this->session->userdata('id_desa');
                  $desaDetail = $this->db->query("SELECT*FROM desa WHERE id_desa='$idDesaShow'")->row();
                  if($this->session->userdata('level')=="Pegawai"){ ?>
                    Desa <?=$desaDetail->nm_desa ?>
                  <?php } ?>
                </p>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?= base_url('login/logout')?>" onclick="return confirm('Apakah anda ingin logout?')"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!--end header -->