<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Data Pegawai</h5>
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
                                    <th><b>NIP</b></th>
                                    <th><b>Nama</b></th>
                                    <th><b>Jabatan</b></th>
                                    <th><b>Bidang</b></th>
                                    <th><b>Desa</b></th>
                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($pegawaiList as $k): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                     <td><?php echo $k->nip ?></td>
                                     <td><img src="<?php echo base_url('assets/images/users/'.$k->foto) ?>" alt="" width='50' height='50' class="thumb-md rounded-circle">&nbsp;&nbsp;<?php echo $k->nm_pegawai ?></td>
                                       <td><?php echo $k->jabatan ?></td>
                                     <td><?php echo $k->bidang ?></td>
                                     <td>Desa <?php echo $k->nm_desa ?> - <br>Kec <?php echo $k->nm_kecamatan ?></td>
                                    <td>
                     <div class="d-flex order-actions">
                        <a onclick="deleteConfirm('<?php echo site_url('adm/pegawai/hapus/'.$k->id_user); ?>')" href="#!" class="btn btn-danger waves-effect waves-light" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-danger"><i class='bx bx-trash'></i></a>

                        <a data-bs-toggle="modal" data-bs-target="#bb<?=$k->id_pegawai?>" class="btn btn-primary waves-effect waves-light"><font color="white"><i class="bx bx-edit"></i></font></a>
                  
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
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Pegawai</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pegawai/add'); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">NIP</label>
                          <input type="text" name="nip" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
  
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Pegawai</label>
                          <input type="text" name="nm_pegawai" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_pegawai') ?></font>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Jabatan</label>
                          <input type="text" name="jabatan" class="form-control  round ">
                        </fieldset>

                           <fieldset class="form-group floating-label-form-group">
                          <label for="email">Bidang</label>
                          <input type="text" name="bidang" class="form-control  round ">
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
                          <label for="email">Upload Foto</label>
                          <input type="file" name="foto" class="form-control">
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
         foreach ($pegawaiList as $k): ?>
                  <div class="modal fade text-left" id="bb<?=$k->id_pegawai?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Edit pegawai</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pegawai/edit'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pegawai" value="<?=$k->id_user?>">
                         <input type="hidden" name="old_image" value="<?php echo $k->foto ?>"/>
                      <div class="modal-body">

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">NIP</label>
                          <input type="text" name="nip" readonly value="<?=$k->nip?>" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nip') ?></font>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pegawai</label>
                          <input type="text" name="nm_pegawai" value="<?=$k->nm_pegawai?>" class="form-control  round " required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_pegawai') ?></font>
                        </fieldset>


                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Jabatan</label>
                          <input type="text" name="jabatan" value="<?=$k->jabatan?>" class="form-control  round ">
                        </fieldset>

                           <fieldset class="form-group floating-label-form-group">
                          <label for="email">Bidang</label>
                          <input type="text" name="bidang" value="<?=$k->bidang?>" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Asal Desa</label>
                          <select name="id_desa" disabled id="select" required class="form-control">
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

                        <div class="row">
           <div class="col-lg-8 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Foto</label><br>
              <input type="file" name="foto">
            </fieldset>
          </div>

          <div class="col-lg-4 col-md-6 col-6">
            <img src="<?php echo base_url('assets/images/users/'.$k->foto) ?>" alt="" height="75">
          </div>
        </div>

                        
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