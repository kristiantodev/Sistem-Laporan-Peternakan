
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0">Total Kecamatan</p>
                    <h4 class="my-1"><?php $array = array('deleted' => 0);
  echo $total = $this->db->where($array)->count_all_results('kecamatan');?> Data</h4>
                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i></p>
                  </div>
                  <div class="widgets-icons ms-auto"><i class='bx bxs-wallet'></i>
                  </div>
                </div>
                <div id="chart1"></div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0">Total Pegawai</p>
                    <h4 class="my-1"><?php $array = array('deleted' => 0);
  echo $total = $this->db->where($array)->count_all_results('pegawai');?> Data</h4>
                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i></p>
                  </div>
                  <div class="widgets-icons ms-auto"><i class='bx bxs-group'></i>
                  </div>
                </div>
                <div id="chart2"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0">Total Desa</p>
                    <h4 class="my-1"><?php $array = array('deleted' => 0);
  echo $total = $this->db->where($array)->count_all_results('desa');?> Data</h4>
                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i></p>
                  </div>
                  <div class="widgets-icons ms-auto"><i class='bx bxs-binoculars'></i>
                  </div>
                </div>
                <div id="chart3"></div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->
        
            


          </div>
        </div>
      </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    
    
  </div>
  <!--end wrapper-->
  <!--start switcher-->

