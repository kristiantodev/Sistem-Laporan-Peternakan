<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Populasi Hewan Ternak</h5>
              </div>
              <div class="font-22 ms-auto">

              </div>
            </div>
            <hr/>

            <div class="table-responsive">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Nama Populasi</b></th>
                                    <th><b>Desa</b></th>
                                    <th><b>Bulan-Tahun</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
         <?php $no=1; foreach ($populasiList as $k): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                     <td>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#bb<?=$k->id_populasi?>">
                                      <?php echo $k->nm_populasi ?></a></td>
                                    <td>Desa <?php echo $k->nm_desa ?><br>Kec.<?php echo $k->nm_kecamatan ?></td>
                                     <td><?php echo $k->bulan ?> <?php echo $k->tahun ?></td>
                                     <td>ACC Admin :<br>
                                      <?php
                                       if ($k->admin_acc == 0) {
                                          $status="New";
                                          $badge="badge bg-info";
                                       }else if ($k->admin_acc == 1){
                                          $status="Data Diterima";
                                          $badge="badge bg-success";
                                       }else{
                                          $status="Data Ditolak";
                                          $badge="badge bg-danger";
                                       }
                                      ?>
                                        <span class="<?=$badge;?>"><?=$status;?></span>

                                        <br>ACC Kepala Bidang :<br>
                                      <?php
                                       if ($k->kep_bidang_acc == 0) {
                                          $status2="Belum di ACC";
                                          $badge2="badge bg-info";
                                       }else if ($k->kep_bidang_acc == 1){
                                          $status2="Data Diterima";
                                          $badge2="badge bg-success";
                                       }else{
                                          $status2="Data Ditolak";
                                          $badge2="badge bg-danger";
                                       }
                                      ?>

<span class="<?=$badge;?>"><?=$status2;?></span>

                                 <br>ACC Petugas Vaksin :<br>
                                      <?php
                                       if ($k->acc_petugas == 0) {
                                          $status2="Belum di ACC";
                                          $badge2="badge bg-info";
                                       }else if ($k->acc_petugas == 1){
                                          $status2="Data Diterima";
                                          $badge2="badge bg-success";
                                       }else{
                                          $status2="Data Ditolak";
                                          $badge2="badge bg-danger";
                                       }
                                      ?>
                                        <span class="<?=$badge2;?>"><?=$status2;?></span>
                                      </td>
                                   <td>
                                     <?php if ($k->acc_petugas == 0) { ?>
                                      <a onclick="deleteConfirm('<?php echo site_url('petugas/populasi/tolak/'.$k->id_populasi); ?>')" href="#!" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                            <button type="button" class="btn btn-light">
                                    <i class="bx bx-trash"></i> Tolak&nbsp;&nbsp;</button>
                                </a>
                                <br>
                                          <a data-bs-toggle="modal" data-bs-target="#bbedit<?=$k->id_populasi?>">
                                            <button type="button" class="btn btn-light">
                                    <i class="bx bx-check"></i> Terima</button>
                                </a>
                                     <?php } ?>

                                   </td>
                                </tr>
          <?php endforeach; ?>
                                                </tbody>
                                            </table>

          

            </div>


          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    
    
  </div>
  <!--end wrapper-->
  <!--start switcher-->


  <!-- Modal -->
                  <div class="modal fade text-left" id="bb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Tambah Populasi Hewan Ternak</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pegawai/populasi/add'); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Judul Populasi</label>
                          <input type="text" name="nm_populasi" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                        </fieldset>

                        <div class="row">
               <div class="col-lg-4 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                          <label for="email">Bulan</label>
                        <select name="bulan" id="select" required class="form-control">
                          <option value="">-- Pilih Bulan --</option>
    <?php

    $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];


    for ($i = 0; $i < 12; $i++) {
    
?>
   <option value="<?php echo $bulan[$i];?>"><?php echo $bulan[$i];?></option>
   <?php }?>
</select>
</fieldset>
              </div>

              <div class="col-lg-4 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
  <label for="email">Tahun</label>
                        <select name="tahun" id="select" required class="form-control">
                          <option value="">-- Pilih Tahun --</option>
    <?php

    for ($u = 2000; $u <= 2030; $u++) {
    
?>
   <option value="<?php echo $u;?>"><?php echo $u;?></option>
   <?php }?>
</select>
</fieldset>
              </div>
              <div class="col-lg-4 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
            <label for="email">Upload Bukti *pdf</label><br>
            <input type="file" name="file" class="form-control">
          </fieldset>
              </div>
            </div>

<br>
Populasi Hewan Ternak :
<table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Umur</b></th>
                                    <th><b>Sapi Perah</b></th>
                                    <th><b>Sapi Potong</b></th>
                                    <th><b>Kerbau</b></th>
                                    <th><b>Kambing</b></th>
                                    <th><b>Domba</b></th>
                                    <th><b>Kuda</b></th>
                                    <th><b>Babi</b></th>
                                    <th><b>Ayam Buras</b></th>
                                    <th><b>Ayam Pedaging</b></th>
                                    <th><b>Ayam Petelur</b></th>
                                    <th><b>Itik</b></th>
                                </tr>
                                                </thead>
                                                <tbody>
          <?php for ($a = 1; $a <= 3; $a++) { ?>
              <?php
                  if ($a==1) {
                    $remark="Anak 0-1 Tahun";
                  }else if ($a==2) {
                    $remark="Dara 1-2 Tahun";
                  }else if ($a==3) {
                    $remark="Dewasa > 2 Tahun";
                  }
              ?>

              <tr>
                <td><?=$a;?></td>
                 <td><input type="hidden" value="<?=$remark;?>" name="umur_hewan_<?=$a;?>" class="form-control">
                  <?=$remark;?></td>
                 <td><input type="number" value="0" name="hewan1_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan2_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan3_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan4_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan5_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan6_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan7_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan8_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan9_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan10_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" value="0" name="hewan11_<?=$a;?>" class="form-control"></td>
              </tr>
                      

            <?php }?>
                                             
                                                </tbody>
                                            </table>

                        
                      </div>
                      <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-primary btn-sm">
                                    <i class="fa fa-save"></i>&nbsp;Simpan
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div> 

 <?php $no=1; foreach ($populasiList as $k): ?>
                    <!-- Modal -->
                  <div class="modal fade text-left" id="bb<?=$k->id_populasi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Tambah Populasi Hewan Ternak</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pegawai/populasi/add'); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        
Populasi Hewan Ternak :
<table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th><b>Umur</b></th>
                                    <th><b>Gender</b></th>
                                    <th><b>Sapi Perah</b></th>
                                    <th><b>Sapi Potong</b></th>
                                    <th><b>Kerbau</b></th>
                                    <th><b>Kambing</b></th>
                                    <th><b>Domba</b></th>
                                    <th><b>Kuda</b></th>
                                    <th><b>Babi</b></th>
                                    <th><b>Ayam Buras</b></th>
                                    <th><b>Ayam Pedaging</b></th>
                                    <th><b>Ayam Petelur</b></th>
                                    <th><b>Itik</b></th>
                                </tr>
                                                </thead>
                                                <tbody>
          <?php foreach ($populasiDetail as $d): ?>
            <?php if ($k->id_populasi == $d->id_populasi) { ?>

              <tr>
                <td><?=$d->umur_hewan;?></td>
                <td><?=$d->jk_hewan;?></td>
                 <td><input type="number" disabled value="<?=$d->hewan_1;?>" name="hewan1_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_2;?>" name="hewan2_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_3;?>" name="hewan3_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_4;?>" name="hewan4_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_5;?>" name="hewan5_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_6;?>" name="hewan6_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_7;?>" name="hewan7_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_8;?>" name="hewan8_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_9;?>" name="hewan9_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_10;?>" name="hewan10_<?=$a;?>" class="form-control"></td>
                 <td><input type="number" disabled value="<?=$d->hewan_11;?>" name="hewan11_<?=$a;?>" class="form-control"></td>
              </tr>
                      
               <?php } ?>
            <?php endforeach; ?>
                                             
                                                </tbody>
                                            </table>
<br>
<center>
            File :<br>
            <?php if ($k->file == "default.png") { ?>
              <center>
            <img src="<?php echo base_url('assets/images/populasi/'.$k->file) ?>" height="500" height="750"><br>Tidak ada file permohonan yang dilampirkan</center>
            <?php }else{ ?>
<embed src="<?php echo base_url('assets/images/populasi/'.$k->file) ?>" width="920px" height="750px" />
             <?php }?> 
                        
</center>                     
 </div>
                      <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div> 

      <?php endforeach; ?>


      <!-- Modal -->
                <?php $no=1; foreach ($populasiList as $k): ?>
                  <div class="modal fade text-left" id="bbedit<?=$k->id_populasi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Konfirmasi Penerimaan Data</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('petugas/populasi/terima'); ?>" method="post">
                        <input type="hidden" name="id_populasi" value="<?=$k->id_populasi?>">
                      <div class="modal-body">
                        Apakah anda yakin ??
                      </div>
                      <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-primary btn-sm">
                                    <i class="fa fa-save"></i>&nbsp;Terima Data
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div> 

                  <?php endforeach; ?>



                           <!-- modal -->
<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
      <h5 class="modal-title"><font color='white'>Konfirmasi Penghapusan</font></h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin akan menolak data ini ?</p>
      </div>
      <div class="modal-footer">
      <a href="#" id="btn-delete" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;Tolak Data</a>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>