

   <?php 
   include  'FixedNavbar.php';// atvaizdouname meniu
   include  'db_functions.php';// ikrauname reikalingas DB funkcijas
   ?>
    
   <?php
   	$uzsakymas_id=$_GET["id"];
	delete_uzsakymas($uzsakymas_id);
		

   ?>
	  <div class="container theme-showcase" role="main">
 <div class="page-header em_head">
        <h1  class=em_h1>Panaikinti užsakymą</h1>
      </div>
	   <div class="em_uzsakymas">
	  <div class="row">
	  <div class="col-md-12">
          <div class="alert alert-success col-md-8" role="alert">
        Užsakymas ištrintas
      </div>
	  </div>
      </div> 
  </div> 
   <?php 
   include  'FixetFooter.php';
   ?>