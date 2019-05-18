
   <?php 
   include  'FixedNavbar.php'
   ?>

    <div class="container theme-showcase" role="main">

		<div class="page-header em_head">
        <h3  class="em_h3">Siūlome vienos ir dviejų dienų maršrutus ramaus poilsio ir aktyvių pramogų mėgėjams!</h3>
      </div>
     
      <div class="row">
        <div class="col-sm-4">
		  <a href="uzsakyti.php?id=1" ><img class=em_img src="images/geriausi_pasiulimai.jpg" alt="geriausi pasiulimai"
		  onmouseover="$(this)[0].src='images/geriausi_pasiulimai_BW.jpg' ;"
		  onmouseout="$(this)[0].src='images/geriausi_pasiulimai.jpg' ;"/> </a>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
		<a href = "marsrutai.php">
          <img class=em_img src="images/marsrutai.jpg" alt="marsrutai"
		  onmouseover="$(this)[0].src='images/marsrutai_BW.jpg' ;"
		  onmouseout="$(this)[0].src='images/marsrutai.jpg' ;"> </a>
		  
		  
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
          
		  <a href="kontaktai.php"><img class=em_img src="images/kontaktai.jpg" alt="kontaktai"
		  onmouseover="$(this)[0].src='images/kontaktai_BW.jpg' ;"
		  onmouseout="$(this)[0].src='images/kontaktai.jpg' ;"/> </a>
        </div><!-- /.col-sm-4 -->
      </div>




     <!-- </div>/container -->


 <?php 
   include  'FixetFooter.php';
   ?>