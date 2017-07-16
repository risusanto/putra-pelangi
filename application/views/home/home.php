<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="<?=base_url('home/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('home/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('home/css/style.css')?>">
    <!-- =======================================================
        Theme Name: Medilab
        Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  	<!--banner-->
	<section id="banner" class="banner">
		<div class="bg-color">
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			  	<div class="col-md-12">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>
				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class=""><a href="<?=base_url('login')?>">Login</a></li>
				      </ul>
				    </div>
				</div>
			  </div>
			</nav>
			<div class="container">
				<div class="row">
					<div class="banner-info">
						<div class="banner-text text-center">
							<h1 class="white">Putra Pelangi Perkasa</h1>
							<p>Memberikan kepuasan dan kenyamanan dalam perjalanan anda, karena Kenyamanan dan kepuasan Anda adalah kebanggaan kami.</p>
							<a href="<?=base_url('web/rute')?>" class="btn btn-appoint">Cek tujuaan anda</a>
						</div>
						<div class="overlay-detail text-center">
			               <a href=""><i class="fa fa-angle-down"></i></a>
			             </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ banner-->

	<!--doctor team-->
	<section id="doctor-team" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Galeri Kami</h2>
					<hr class="botm-line">
				</div>
      <?php for ($i=1; $i <=4 ; $i++): ?>
  				<div class="col-md-3 col-sm-3 col-xs-6">
  			      <div class="thumbnail">
  			      	<img src="<?=base_url('assets/galeri/'.$i.'.jpg')?>" alt="..." class="team-img">
  			      </div>
  			    </div>
      <?php endfor; ?>
			</div>
		</div>
	</section>
	<!--/ doctor team-->
	<!--footer-->
	<footer id="footer">
		<div class="footer-line">
			<div class="container">
				<div class="row">
				</div>
			</div>
		</div>
	</footer>
	<!--/ footer-->

    <script src="<?=base_url('home/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('home/js/jquery.easing.min.js')?>"></script>
    <script src="<?=base_url('home/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('home/js/custom.js')?>"></script>

  </body>
</html>
