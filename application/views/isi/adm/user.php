<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Data Pengguna</h5>
              </div>
              <div class="font-22 ms-auto">

                <a data-bs-toggle="modal" data-bs-target="#bb">
                                            <button type="button" class="btn btn-light">
                                    <i class="bx bx-plus"></i> Tambah Pengguna</button>
                                </a>

              </div>
            </div>
            <hr/>

            <div class="table-responsive">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Foto</b></th>
                                    <th><b>Nama Pengguna</b></th>
                                    <th><b>Username</b></th>
                                    <th><b>Level</b></th>
                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($userku as $user): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td align="center"><img src="<?php echo base_url('assets/images/users/'.$user->foto) ?>" alt="" height="55"></td>
                                    <td>
                                      <?php echo $user->nm_user ?>
                                       
                                        <?php if($user->level == "Perguruan Tinggi"){ ?>
                                              <br>(<?php echo $user->nm_pt ?>)
                                        <?php } ?>
                                      </td>
                                    <td><?php echo $user->username ?></td>
                                     <td><?php echo $user->level ?></td>
                                    <td>

               <?php if($this->session->userdata('username') != $user->username){ ?>

                     <?php if($user->level != "Admin"){ ?>
                     <div class="d-flex order-actions">
                        <a onclick="deleteConfirm('<?php echo site_url('adm/user/hapus/'.$user->id_user); ?>')" href="#!" class="ms-4" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-danger"><i class='bx bx-trash'></i></a>
                  
                      </div>
                    <?php } ?>
                                      <?php }else{
                                        echo "Anda Sedang Login";
                                      } ?>


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
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Pengguna Sistem</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/user/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Pengguna</label>
                          <input type="text" name="nm_user" class="form-control  round <?php echo form_error('nm_user') ? 'is-invalid':'' ?>" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_user') ?></font>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Username</label>
                          <input type="text" name="username" class="form-control  round" >
                
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password</label>
                          <input type="password" name="password" class="form-control  round">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Level</label>
                          <select name="level" id="select" required class="form-control">
                                        <option value="" readonly>-- Pilih Level --</option>  
                                    <option value="Administrator" readonly>Administrator</option>
                                    <option value="Kepala Dinas" readonly>Kepala Dinas</option>
                                    <option value="Kepala Bidang" readonly>Kepala Bidang</option>
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