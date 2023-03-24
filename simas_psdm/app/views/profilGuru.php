<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">SELAMAT DATANG </h3>
                  <h6 class="font-weight-normal mb-0"> <span class="text-primary">Profil Bapak/Ibu Guru Pengajar di SMKN 4 Malang</span></h6>
                  </div>
                  </div>
                </div>
              </div>
              
                  <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-tale">
                          <div class="card-body">
                            <p class="mb-4">Profil Guru Tiap Mata Pelajaran</p>
                            <p class="fs-30 mb-2">200 orang</p>
                            <p>Guru yang mengajar</p>
                            <a class="small text-white stretched-link" id="menuGuruMapel" href="guruMapel.html">Lihat Detail</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                          <div class="card-body">
                            <p class="mb-4">Profil Guru Produktif</p>
                            <p class="fs-30 mb-2">150 orang</p>
                            <p>Guru yang mengajar</p>
                            <a class="small text-white stretched-link" id="menuGuruProduktif" href="guruProduktif.html">Lihat Detail</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                    <div>
              </div>
            </div>
          </div>
        </div>          
    <script>
        $(document).ready(function () {
			var menu = $(this).attr('id');
            if (menu == 'menuGuruMapel') {
                $('.stretched-link').removeClass('active');
                $(this).addClass('active');
                $('#isi').load('guruMapel.php');
            }else if (menu == 'menuGuruProduktif') {
                $('.stretched-link').removeClass('active');
                $(this).addClass('active');
                $('#isi').load('guruProduktif.php');
            }
			});
		
    </script>