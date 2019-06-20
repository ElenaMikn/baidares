

   <?php 
   include  'FixedNavbar.php';// atvaizdouname meniu
   if($_COOKIE['user_id'] !="")
   {
	 $usreIinfo=get_klientas_info($_COOKIE['user_id'] );
   }
   
   $usreIinfo[0]["isAdmin"]=$usreIinfo[0]["isAdmin"]!=1?0:1;
   if($usreIinfo!=null && $usreIinfo[0]["isAdmin"]!=1)
   {
	   ?>
		<div class="container theme-showcase em_margin_bottom" role="main" >
	 		<div class="page-header em_head">
        	<h1 class=em_h1>Jūs neturite teisės matyti šių duomenų</h1>
      		</div>
		</div>
	   <?php
	include  'FixetFooter.php';
	return;
   }
   ?>

    <div class="container theme-showcase em_margin_bottom" role="main" >
	 <div class="page-header em_head">
        <h1 class=em_h1>Užsakymų peržiūra</h1>
      </div>
	  <div class="row  em_uzsakymas em_margin_bottom">
	   <form action="uzsakymai_admin.php" method="POST">
		 <input type="hidden" name="user_id"  >
	   <input type="date" name="plaukimo_data" value="<?php
	  if($_POST!=null )
   {
	   echo $_POST['plaukimo_data'];
   }
	  ?>">
	   <input type="submit" name="submit"   class="btn btn-xs btn-info"  value="Ieškoti">
	   </form>

	  
              <div class="col-md-12 table-responsive ">
			  <table class="table ">
            <thead>
              <tr>
                <th>Pavadinimas</th>
                <th>Data</th>
				<th>Kiekis</th>
                <th>Nakvynė</th>
                <th>Vardas Pavardė</th>
                <th>Telefono numeris</th> 
				<th>Veiksmai</th>
              </tr>
            </thead>
            <tbody>
<?php
if($_POST==null )
   {
		 if($_COOKIE['user_id'] !="")
		 {
		 	$uzsakymai=get_uzsakymai($_COOKIE['user_id'] );
		 }
   }
   else
   {
		//setcookie("user_id", $_POST['user_id'], time()+3600);  /* expire in 1 hour */
		//$_COOKIE['user_id'] = $_POST['user_id'];
	   if($_POST['plaukimo_data']!=null)
	   {
 		   $uzsakymai=get_uzsakymai_by_date($_POST['plaukimo_data'],$_POST['user_id']);
	   }
	   else
		   {
			   $uzsakymai=get_uzsakymai($_POST['user_id']);
		   }
   }
   //print_r($uzsakymai);
   if($uzsakymai!=null)
  foreach($uzsakymai as $uzsakymas)
  {
$ymd = DateTime::createFromFormat('Y-m-d', $uzsakymas['data'])->format('Y-m-d');
?>
     
				<tr <?php if($ymd < date("Y-m-d")) 
				{
					       echo "style='color: #9a9e9a'";
				}						   ?>>
					<td><?php echo $uzsakymas['pavadinimas']?></td>
					<td><?php echo $uzsakymas['data']?></td>
					<td><?php echo $uzsakymas['kiekis']?></td>
					<td><?php echo $uzsakymas['nak_pav']?></td>
					<td><?php echo $uzsakymas['vardas'] ." ". $uzsakymas['pavarde']?></td>
					<td><?php echo $uzsakymas['tel_numeris']?></td>
					<td>
						<button type="button" class="btn btn-xs btn-warning" onclick="window.location.href='trint.php?id=<?php echo $uzsakymas["id"]?>'">Trinti</button>
						<button type="button" class="btn btn-xs btn-primary" onclick="window.location.href='redaguoti.php?id=<?php echo $uzsakymas["id"]?>'">Redaguoti</button>
					</td>
				</tr>
<?php
  }
?>
				</tbody>
			</table>
        </div>
      </div>

		


     <!--</div> /container -->

 <?php 
   include  'FixetFooter.php';
   ?>