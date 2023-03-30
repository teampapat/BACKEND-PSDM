<script src="<?=BASEURL;?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=BASEURL;?>/js/off-canvas.js"></script>
  <script src="<?=BASEURL;?>/js/hoverable-collapse.js"></script>
  <script src="<?=BASEURL;?>/js/template.js"></script>
  <script src="<?=BASEURL;?>/js/settings.js"></script>
  <script src="<?=BASEURL;?>/js/todolist.js"></script>
	<!-- <script>
		$(document).ready(function () {
			$('#isi').load('home.php');

			$('.menu').click(function (e) { 
				e.preventDefault();
				
				var menu = $(this).attr('id');

				if(menu == "menuPrestasiGuru") {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('prestasiGuru.php');
				} else if (menu == 'menuStrukturOrganisasi') {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('strukturOrganisasi.php');
				}else if (menu == 'menuHome') {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('home.php');
        }else if (menu == 'menuProfilGuru') {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('profilGuru.php');
        }else if (menu == 'menuProfilPegawai') {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('profilPegawai.php');
        }else if (menu == 'menuGaleriKegiatan') {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('galeriKegiatan.php');
        }else if (menu == 'menuGuruMapel') {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#isi').load('guruMapel.php');
        }else if (menu == 'menuGuruProduktif') {
          $('.nav-link').removeClass('active');
          $(this).addClass('active');
          $('#isi').load('guruProduktif.php');
        }
			});
		});
	</script> -->

</body>

</html>