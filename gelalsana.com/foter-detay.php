<?php include 'header.php'; 

include 'nedmin/netting/baglan.php';
  // Belirli veriyi seçme işlemi
$fotersor=$db->prepare("SELECT * FROM foter where foter_seo=:seo");
$fotersor->execute(array( 'seo'=>$_GET['sef']));
$fotercek=$fotersor->fetch(PDO::FETCH_ASSOC);

// footer da href dolu ise ve sadece url hakkimizda var onu gösterecek
// eğer href boş ise .htacces sayfa- diye yönlendirerek buraya geken sef ile foter menusundan bilgileri geçiliyor
?>





	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->

				<div class="title-bg">
					<div class="title"><?php echo $fotercek['foter_ad']; ?></div>
				</div>

			
				<div class="page-content">
					<p>
						<?php echo $fotercek['foter_icerik']; ?>
					</p>
				</div>

				

			</div>
			<!-- sidebar buaraya gelecek 
				<?php //echo include 'sidebar.php'; ?>
			sidebar -->
		</div>
		<div class="spacer"></div>
	</div>





<?php include 'footer.php'; ?>