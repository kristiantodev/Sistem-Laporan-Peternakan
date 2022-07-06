<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Data Vaksin Ternak</h5>
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
                                    <th><b>Nama Pemilik</b></th>
                                    <th> <b>Nama Hewan</b></th>
                                      <th><b>Jenis Vaksin</b></th>
                                    <th><b>Tanggal Vaksin</b></th>
                                    <th><b>Nama Dokter</b></th>
                                    <th><b>Keterangan</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $noVaksin=1; foreach ($vaksinList as $v): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $noVaksin++; ?></td>
                                    <td><?php echo $v->nm_pemilik ?><br>
                                      Desa <?php echo $v->nm_desa ?><br>
                                      Kec. <?php echo $v->nm_kecamatan?>
                                    </td>
                                     <td>
                                      <?php if($v->klasifikasi != ""){ ?>
                                                <?php echo $v->klasifikasi ?> 
                                        <?php }else{ ?>
                                                <?php echo $v->nm_hewan ?> 
                                          <?php }?>
                                    
                                      </td>
                                      <td><?php echo $v->jenis_vaksin ?></td>
                                      <td><?php echo $v->tgl_vaksin ?></td>
                                      <td><?php echo $v->dokter ?></td>
                                      <td><?php echo $v->keterangan ?></td>
                                 
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