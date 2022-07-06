<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        
          
        
        
        <!--end row-->
        <div class="card radius-10">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div>
                <form action="<?php echo site_url('adm/laporan/kabupaten'); ?>" method="post">
                        <table class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                  
                                    <td>
                                    Pilih Bulan : <select name="bulan" id="select" required class="form-control">
                          <option value="">-- Pilih Bulan --</option>
    <?php

    $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];


    for ($i = 0; $i < 12; $i++) {
    
?>
   <option value="<?php echo $bulan[$i];?>"><?php echo $bulan[$i];?></option>
   <?php }?>
                                        
                                    </td>
                                    <td>Pilih Tahun : <select name="tahun" id="select" required class="form-control">
                          <option value="">-- Pilih Tahun --</option>
    <?php

    for ($u = 2000; $u <= 2030; $u++) {
    
?>
   <option value="<?php echo $u;?>"><?php echo $u;?></option>
   <?php }?>
</select></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>&nbsp; Filter
                                        </button>
                                        
                    </form>
                    <a href="javascript:printDiv('box');">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-print"></i> &nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                                </a>

                                <a href="<?php echo site_url();?>adm/laporan/kabupaten">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-print"></i> Reset Filter</button>
                                </a>
                                       
                                    </td>
                                </tr>
                            </thead>
                        </table>
              </div>
              <div class="font-22 ms-auto">

              </div>
            </div>
            <hr/>
            <div id="box">
<center><h4>LAPORAN POPULASI TERNAK MENURUT JENISNYA<br>
             <?=$bulanShow;?> <?=$tahunShow;?>
                        <br>Di Kabupaten : Ogan Ilir

                        
                        
                      </center>
            <div class="table-responsive">
               <table border="1" class="table table-striped table-bordered" style="width:100%">
                                                <thead bgcolor="">
                                                <tr>
                                    <th><b>Kecamatan</b></th>
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
          <?php 
           $total1=0;
           $total2=0;
           $total3=0;
           $total4=0;
           $total5=0;
           $total6=0;
           $total7=0;
           $total8=0;
           $total9=0;
           $total10=0;
           $total11=0;
          foreach ($populasiDetail as $d): ?>

            <?php
                $total1=$total1+$d->hewan_1;
           $total2=$total2+$d->hewan_2;
           $total3=$total3+$d->hewan_3;
           $total4=$total4+$d->hewan_4;
           $total5=$total5+$d->hewan_5;
           $total6=$total6+$d->hewan_6;
           $total7=$total7+$d->hewan_7;
           $total8=$total8+$d->hewan_8;
           $total9=$total9+$d->hewan_9;
           $total10=$total10+$d->hewan_10;
           $total11=$total11+$d->hewan_11;
             ?>

              <tr>
                <td><?=$d->nm_kecamatan;?></td>
                 <td><?=$d->hewan_1;?></td>
                 <td><?=$d->hewan_2;?></td>
                 <td><?=$d->hewan_3;?></td>
                 <td><?=$d->hewan_4;?></td>
                 <td><?=$d->hewan_5;?></td>
                 <td><?=$d->hewan_6;?></td>
                 <td><?=$d->hewan_7;?></td>
                 <td><?=$d->hewan_8;?></td>
                 <td><?=$d->hewan_9;?></td>
                 <td><?=$d->hewan_10;?></td>
                 <td><?=$d->hewan_11;?></td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <td>JUMLAH</td>
              <td><?=$total1;?></td>
              <td><?=$total2;?></td>
              <td><?=$total3;?></td>
              <td><?=$total4;?></td>
              <td><?=$total5;?></td>
              <td><?=$total6;?></td>
              <td><?=$total7;?></td>
              <td><?=$total8;?></td>
              <td><?=$total9;?></td>
              <td><?=$total10;?></td>
              <td><?=$total11;?></td>
            </tr>
                                             
                                                </tbody>
                                            </table>

                                          </div>

          

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