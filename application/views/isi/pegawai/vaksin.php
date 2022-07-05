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
              </div>
            </div>
            <hr/>

            <div class="table-responsive">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th width="250"> <b>Nama Pemilik</b></th>
                                      <th><b>Asal Desa</b></th>
                                    <th width="150"><b>Jumlah Hewan Vaksin</b></th>
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
                                      <?php echo $k->pekerjaan ?><br>
                                      <?php echo $k->umur ?> Tahun<br>
                                        HP &nbsp;&nbsp;: <?php echo $k->hp ?><br> 
                                        NIK : <?php echo $k->nik ?>  
                                      </td>
                                      <td>Desa <?php echo $k->nm_desa ?> - Kec <?php echo $k->nm_kecamatan ?></td>
                                     <td>

                                     <?php $array = array('deleted' => 0, 'id_pemilik'=> $k->id_pemilik);
  echo $total = $this->db->where($array)->count_all_results('vaksin');?> Data</td>
                                       
                                    <td>

                                      <a data-bs-toggle="modal" data-bs-target="#bb<?=$k->id_pemilik?>">
                                            <button type="button" class="btn btn-light">
                                    <i class="bx bx-plus"></i> Tambah</button>
                                </a>
<br>
                              <a data-bs-toggle="modal" data-bs-target="#ternak<?=$k->id_pemilik?>">
                                            <button type="button" class="btn btn-light">
                                    <i class="bx bx-book-open"></i> Detail&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </a>

                     
      
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
                   <?php $no=1;
         foreach ($pemilikList as $k): ?>
                  <div class="modal fade text-left" id="bb<?=$k->id_pemilik?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Vaksin Ternak - <?=$k->nm_pemilik?> (Desa <?=$k->nm_desa?>)</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/vaksin/add'); ?>" method="post">
                        <input type="hidden" name="id_pemilik" value="<?=$k->id_pemilik?>">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Hewan</label>
                          <select name="id_hewan" id="select" required class="form-control">
                            <option value="">-- Pilih Hewan --</option>
                  <?php foreach ($hewanList as $kk): ?>
                  <option value="<?php echo $kk->id_hewan ?>">
                          <?php if($kk->klasifikasi != ""){ ?>
                                                <?php echo $kk->klasifikasi ?> 
                                        <?php }else{ ?>
                                                <?php echo $kk->nm_hewan ?> 
                                          <?php }?>
                  </option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Jenis Vaksin</label>
                          <input type="text" name="jenis_vaksin" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Dokter</label>
                          <input type="text" name="dokter" class="form-control  round ">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Tanggal Vaksin</label>
                          <input type="date" name="tgl_vaksin" value="<?= date("Y-m-d"); ?>" class="form-control  round ">
                        </fieldset>

                          <fieldset class="form-group floating-label-form-group">
                          <label for="email">Keterangan</label>
                          <textarea class="form-control" name="keterangan"id="title1" rows="3"></textarea>
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

                                     <!-- Modal -->
                   <?php $no=1;
         foreach ($pemilikList as $k): ?>
                  <div class="modal fade text-left" id="ternak<?=$k->id_pemilik?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Data Vaksin Ternak - <?=$k->nm_pemilik?> (Desa <?=$k->nm_desa?>)</font></h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </button>
                      </div>
                        <input type="hidden" name="id_pemilik" value="<?=$k->id_pemilik?>">
                      <div class="modal-body">
                        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th> <b>Nama Hewan</b></th>
                                      <th><b>Jenis Vaksin</b></th>
                                    <th><b>Tanggal Vaksin</b></th>
                                    <th><b>Nama Dokter</b></th>
                                    <th><b>Keterangan</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $noVaksin=1; foreach ($vaksinList as $v): ?>
          <?php if ($v->id_pemilik == $k->id_pemilik) { ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $noVaksin++; ?></td>
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
          <?php } ?>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>

                      </div>
                      <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                      </div>
                    </div>
                    </div>
                  </div> 

                  <?php endforeach; ?>
