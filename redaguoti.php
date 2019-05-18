

   <?php 
   include  'FixedNavbar.php';// atvaizdouname meniu
   include  'db_functions.php';// ikrauname reikalingas DB funkcijas
    if($_POST==null )
   {
   $uzsakymas_id=$_GET["id"];
   $uzsakymas=get_uzsakymas($uzsakymas_id);
   ?>
     <div class="container theme-showcase" role="main">
	 <div class="page-header em_head">
        <h1  class=em_h1>Redaguoti</h1>
      </div>
	  <div class="em_uzsakymas">
	   <form action="redaguoti.php" method="POST">
	   <div class="row">
	   <div class="col-md-12">
	   <div class="col-md-12 col-lg-4">
	    <input type="hidden" name="id" value=<?php echo $uzsakymas_id?> >
		
		<label for="plaukimo_data">Data</label>
	   <input type="date" name="plaukimo_data" id="plaukimo_data" value="<?php
	  
	   echo $uzsakymas[0]["data"];
   
	  ?>">
	  </div>
	  <div class="col-md-12 col-lg-4">
	  <label for="plaukimo_kiekis">Kiekis</label>
	  <input type="number" name="plaukimo_kiekis" id="plaukimo_kiekis"  value="<?php
	  
	   echo $uzsakymas[0]["kiekis"];
   
	  ?>">
	  </div>
	  <div class="col-md-12 col-lg-4">
	   <input type="submit" name="submit"   class="btn btn-xs btn-info"  value="Išsaugoti">
	   </div>
	   </div>
	   </div>
	   </form>
	   </div>
   <?php
   }
   else{
	 ?>
	 <div class="container theme-showcase" role="main">
		<div class="page-header em_head">
			<h1  class=em_h1>Užsakymo datos ir kiekio redagavimas</h1>
		</div>
		<div class="em_uzsakymas">
	  <div class="row">
	  <div class="col-md-12">
	 <?php
	 $rez=set_uzsakymas_data($_POST["id"],$_POST["plaukimo_data"],$_POST["plaukimo_kiekis"]);
	 if($rez==1)
     {
       ?>
       <div class="alert alert-success col-md-8" role="alert">
        <strong>AČiū!</strong> Jūsų užsakymai sėkmingai išsiustas
      </div>
       <?php
     }
     else
     {
       ?>
       <div class="alert alert-danger" role="alert">
        <strong>Upsss!</strong> <?=$rez ?>
      </div>
       <?php
     }
   ?>
	
        
       </div>
	</div>
	</div>
  <?php }
   
   include  'FixetFooter.php';
   ?>