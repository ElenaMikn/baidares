

   <?php 
   include  'db_functions.php';// ikrauname reikalingas DB funkcijas
   include  'FixedNavbar.php';// atvaizdouname meniu
   ?>

    <div class="container theme-showcase em_margin_bottom" role="main">
	 <div class="page-header em_head">
        <h1 class=em_h1>Maršrutai</h1>
      </div>
      <div class="row em_margin_bottom">
<?php
   $marsrutai=get_marsrutai_all_info();
   //print_r($marsrutai[0]);
  foreach($marsrutai as $marsrutas)
  {
//print_r($marsrutas["pavadinimas"]);
?>
     
    
        <div class="col-sm-4">
          <ul class="list-group">
            <li class="list-group-item"><?php echo $marsrutas['pavadinimas']?></li>
            <li class="list-group-item">Maršruto ilgis <?php echo $marsrutas['ilgis_km']?> Km</li>
            <li class="list-group-item">Galimas maistas<br>
              <?php
              foreach($marsrutas["maistas"] as $maistas)
              {
                echo $maistas["pavadinimas"]." kaina ".$maistas["kaina"]." Eur/vien<br>";
              }
              ?>
            </li>
            
              <?php
              if($marsrutas["nakvyne"]!=null && sizeof($marsrutas["nakvyne"])>0)
              {
                ?>
                <li class="list-group-item">
                Galimos nakvynės<br>
                <?php
                foreach($marsrutas["nakvyne"] as $nakvyne)
                {
                  echo $nakvyne["pavadinimas"]." kaina ".$nakvyne["kaina"]. " Eur/žmogu/naktis <br>";
                }
                ?>
                </li>
                <?php
              }
              ?>
            
            <li class="list-group-item">
            <button type="button" class="btn btn-xs btn-success" onclick="window.location.href='uzsakyti.php?id=<?php echo $marsrutas["id"]?>'">Paskaičiuoti ir Užsakyti</button>
            </li>
          </ul>
        </div>
<?php
  }
?>
        
      </div>




     <!-- </div>	 /container -->

 <?php 
   include  'FixetFooter.php';
   ?>