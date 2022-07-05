<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Data Desa</h5>
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
                                    <th><b>Desa</b></th>
                                    <th><b>Kecamatan</b></th>
                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($desaku as $k): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                     <td><?php echo $k->nm_desa ?></td>
                                     <td><?php echo $k->nm_kecamatan ?></td>
                                    <td>
                     <div class="d-flex order-actions">
                        <a onclick="deleteConfirm('<?php echo site_url('adm/desa/hapus/'.$k->id_desa); ?>')" href="#!" class="btn btn-danger waves-effect waves-light" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-danger"><i class='bx bx-trash'></i></a>

                        <a data-bs-toggle="modal" data-bs-target="#bb<?=$k->id_desa?>" class="btn btn-primary waves-effect waves-light"><font color="white"><i class="bx bx-edit"></i></font></a>
                  
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
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Desa</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/desa/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Desa</label>
                          <input type="text" name="nm_desa" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_desa') ?></font>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Kecamatan</label>
                          <select name="id_kecamatan" id="select" required class="form-control">
                            <option value="">-- Pilih Kecamatan --</option>
                  <?php foreach ($kecamatanList as $kk): ?>
                  <option value="<?php echo $kk->id_kecamatan ?>"><?php echo $kk->nm_kecamatan ?></option>
                  <?php endforeach; ?>
                </select>
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
         foreach ($desaku as $k): ?>
                  <div class="modal fade text-left" id="bb<?=$k->id_desa?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Edit Desa</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/desa/edit'); ?>" method="post">
                        <input type="hidden" name="id_desa" value="<?=$k->id_desa?>">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Desa</label>
                          <input type="text" name="nm_desa" value="<?=$k->nm_desa?>" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_desa') ?></font>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Kecamatan</label>
                          <select name="id_kecamatan" id="select" required class="form-control">
                  <?php foreach ($kecamatanList as $kk): ?>
                  <option value="<?php echo $kk->id_kecamatan ?>"

                   
                   <?php
                              if ($k->id_kecamatan == $kk->id_kecamatan){
                              echo "selected";
                                    }else{
                              echo "";
                              }
                              ?>

                    ><?php echo $kk->nm_kecamatan ?></option>
                  <?php endforeach; ?>
                </select>
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