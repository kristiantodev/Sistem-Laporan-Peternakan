<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Data Pemilik Ternak</h5>
              </div>
              <div class="font-22 ms-auto">

                <a data-bs-toggle="modal" data-bs-target="#bb">
                                            <button type="button" class="btn btn-light">
                                    <i class="bx bx-plus"></i> Tambah Data</button>
                                </a>

              </div>
            </div>
            <hr/>

            <div class="table-responsive">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Nama Pemilik</b></th>
                                      <th><b>Pekerjaan</b></th>
                                      <th><b>Asal Desa</b></th>
                                    <th width="250"><b>Alamat</b></th>
                                    <th width="100"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($pemilikList as $k): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                     <td>
                                      <?php echo $k->nm_pemilik ?><br>
                                      <?php echo $k->umur ?> Tahun<br>
                                        HP &nbsp;&nbsp;: <?php echo $k->hp ?><br> 
                                        NIK : <?php echo $k->nik ?>  
                                      </td>
                                      <td><?php echo $k->pekerjaan ?></td>
                                      <td>Desa <?php echo $k->nm_desa ?> - <br>Kec <?php echo $k->nm_kecamatan ?></td>
                                     <td><?php echo $k->alamat ?></td>
                                       
                                    <td>
                     <div class="d-flex order-actions">

                      <?php $array = array('deleted' => 0, 'id_pemilik'=> $k->id_pemilik);
  $total = $this->db->where($array)->count_all_results('vaksin');
  if ($total == 0) { ?>
        <a onclick="deleteConfirm('<?php echo site_url('adm/pemilik_ternak/hapus/'.$k->id_pemilik); ?>')" href="#!" class="btn btn-danger waves-effect waves-light" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-danger"><i class='bx bx-trash'></i></a>
  <?php } ?>
                       

                        <a data-bs-toggle="modal" data-bs-target="#bb<?=$k->id_pemilik?>" class="btn btn-primary waves-effect waves-light"><font color="white"><i class="bx bx-edit"></i></font></a>
                  
                      </div>
      
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
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Pemilik Ternak</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pemilik_ternak/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Pemilik</label>
                          <input type="text" name="nm_pemilik" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">NIK</label>
                          <input type="text" name="nik" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Umur</label>
                          <input type="number" name="umur" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">HP</label>
                          <input type="text" name="hp" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pekerjaan</label>
                          <input type="text" name="pekerjaan" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Asal Desa</label>
                          <select name="id_desa" id="select" required class="form-control">
                            <option value="">-- Pilih Desa --</option>
                  <?php foreach ($desaList as $kk): ?>
                  <option value="<?php echo $kk->id_desa ?>"><?php echo $kk->nm_desa ?> - Kec. <?php echo $kk->nm_kecamatan ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                          <fieldset class="form-group floating-label-form-group">
                          <label for="email">Alamat Lengkap</label>
                          <textarea class="form-control" name="alamat" id="title1" rows="3"></textarea>
                        </fieldset>
                        
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


                   <!-- Modal -->
                   <?php $no=1;
         foreach ($pemilikList as $k): ?>
                  <div class="modal fade text-left" id="bb<?=$k->id_pemilik?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Edit Pemilik ternak</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pemilik_ternak/edit'); ?>" method="post">
                        <input type="hidden" name="id_pemilik" value="<?=$k->id_pemilik?>">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Pemilik</label>
                          <input type="text" name="nm_pemilik" value="<?=$k->nm_pemilik?>" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">NIK</label>
                          <input type="text" name="nik" value="<?=$k->nik?>" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Umur</label>
                          <input type="number" name="umur" value="<?=$k->umur?>"class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">HP</label>
                          <input type="text" name="hp" value="<?=$k->hp?>" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pekerjaan</label>
                          <input type="text" name="pekerjaan" value="<?=$k->pekerjaan?>" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Asal Desa</label>
                          <select name="id_desa" id="select" required class="form-control">
                            <option value="">-- Pilih Desa --</option>
                  <?php foreach ($desaList as $kk): ?>
                  <option value="<?php echo $kk->id_desa ?>"
                             <?php
                              if ($k->id_desa == $kk->id_desa){
                              echo "selected";
                                    }else{
                              echo "";
                              }
                              ?>
                    ><?php echo $kk->nm_desa ?> - Kec. <?php echo $kk->nm_kecamatan ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                          <fieldset class="form-group floating-label-form-group">
                          <label for="email">Alamat Lengkap</label>
                          <textarea class="form-control" name="alamat"id="title1" rows="3"><?=$k->alamat?></textarea>
                        </fieldset>
                        
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
      <p>Apakah anda yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
      <a href="#" id="btn-delete" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;Hapus</a>
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