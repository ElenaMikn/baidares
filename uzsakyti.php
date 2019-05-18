

   <?php 
   include  'FixedNavbar.php';// atvaizdouname meniu
   include  'db_functions.php';// ikrauname reikalingas DB funkcijas
   ?>
    <div class="container theme-showcase em_margin_bottom" role="main">
 <div class="page-header em_head">
        <h1 class="em_h1">Užsakyti plaukimą</h1>
      </div>
   <?php
   if($_POST==null)
   {
   $marsruto_id=$_GET["id"];
   //print_r($_GET);
   //print_r($_POST);

   ?>

   

      <div class="row em_uzsakymas em_margin_bottom">
<?php
   $marsrutas=get_marsrutas_info( $marsruto_id);
  //print_r($marsrutas);
 
?>
  <div class="col-md-12">
  <form action="uzsakyti.php" method="POST">
  <input type="hidden" name="marsruto_id" value=<?=  $marsruto_id?> >
  <input type="date" name="plaukimo_data" >
   <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Pavadinimas</th>
          <th>Kaina</th>
          <th>Kiekis</th>
          <th>Suma</th>
        </tr>
      </thead>
            <tbody>
              <tr>
                <td>Plaukimas <?php echo $marsrutas["pavadinimas"]?> <br>viena vieta baidarėje</td>
                <td><?php echo $marsrutas["kaina"]?></td>
                <td><input type="number" min="0" max="999" class="imputt" id="baidares_kiekis" name="baidares_kiekis" onchange="document.getElementById('baidares_suma').value=document.getElementById('baidares_kiekis').value*<?= $marsrutas["kaina"]?>;change_total();"></td>
                <td><input type="number" min="0" max="999" class="suma" id="baidares_suma" onchange="change_total();" readonly></td>
                
              </tr>
              <tr>
                <td colspan="4"><b>Inventorius</b></td>
              </tr>
              
              <?php 
              $i=0;
              foreach($marsrutas["inventorius"] as $inventorius)
              {
                ?>
                <tr>
                <td style="white-space:normal"><?php echo $inventorius["pavadinimas"]?> <input type="hidden" name="inventorius<?= $i?>" value=<?=  $inventorius["id"]?> ></td>
                <td><?php echo $inventorius["kaina"]?></td>
				<td><input type="number" min="0" max="999" class="imputt inventorius" name="inventorius_kiekis<?= $i?>" id="inventorius_kiekis<?= $i?>" onchange="document.getElementById('inventorius_suma<?= $i?>').value=document.getElementById('inventorius_kiekis<?= $i?>').value*<?= $inventorius["kaina"]?>;change_total();"></td>
                <td><input type="number" min="0" max="999" class="suma" id="inventorius_suma<?= $i?>" onchange="change_total();" readonly></td>
              </tr>
                <?php
                $i++;
              }?>
              <tr>
                <td colspan="4"><b>Maistas</b></td>
              </tr>
              
              <?php
              $i=0;
              foreach($marsrutas["maistas"] as $maistas)
              {
                ?>
                <tr>
                <td><?php echo $maistas["pavadinimas"]?><input type="hidden" name="maistas<?= $i?>" value=<?=  $maistas["id"]?> ></td>
                <td><?php echo $maistas["kaina"]?></td>
                <td><input type="number" min="0" max="999" class="imputt maistas" name="maistas_kiekis<?= $i?>"  id="maistas_kiekis<?= $i?>" onchange="document.getElementById('maistas_suma<?= $i?>').value=document.getElementById('maistas_kiekis<?= $i?>').value*<?= $maistas["kaina"]?>;change_total();"></td>
                <td><input type="number" min="0" max="999" class="suma" id="maistas_suma<?= $i?>" onchange="change_total();" readonly></td>
              </tr>
                <?php
                $i++;
              }
              $i=0;
              if($marsrutas["nakvyne"]!=null)
              {
                ?>
              <tr>
                <td colspan="4"><b>Nakvynės</b></td>
              </tr>
              <?php
              foreach($marsrutas["nakvyne"] as $nakvyne)
              {
                ?>
                <tr>
                <td><?php echo $nakvyne["pavadinimas"]?><input type="hidden" name="nakvyne<?= $i?>" value=<?=  $nakvyne["id"]?> ></td>
                <td><?php echo $nakvyne["kaina"]?></td>
                <td><input type="checkbox" min="0" max="999" class="imputt nakvyne" name="nakvyne_kiekis<?= $i?>" id="nakvyne_kiekis<?= $i?>" onchange=" 
				if (document.getElementById('nakvyne_kiekis<?= $i?>').checked==true) 
				{
					document.getElementById('nakvyne_suma<?= $i?>').value=document.getElementById('baidares_kiekis').value*<?= $nakvyne["kaina"]?>;
				} 
				else 
				{
					document.getElementById('nakvyne_suma<?= $i?>').value=0;
				} 
			change_total();"></td>
                <td><input type="number" min="0" max="999" class="suma" id="nakvyne_suma<?= $i?>" onchange="change_total();" readonly></td>
              </tr>
                <?php
                $i++;
              }
            } 
              ?>
              <tr>
                <td colspan="4"><b>Kontaktai</b></td>
              </tr>
              <tr>
                <td>
                  Vardas
                </td>
                <td colspan="3">
                  <input type="text" name="vardas">
                </td>
              </tr>
				<tr>
                <td>
                  Pavarde
                </td>
                <td colspan="3">
                  <input type="text" name="pavarde">
                </td>
              </tr>
			  	<tr>
                <td>
                  E paštas
                </td>
                <td colspan="3">
                  <input type="text" name="epastas">
                </td>
              </tr>
			  <tr>
                <td>
                  Telefono numeris
                </td>
                <td colspan="3">
                  <input type="text" name="tel_numeris">
                </td>
              </tr>
              <tr>
                <td> <input type="submit" name="submit"   class="btn btn-xs btn-success"  value="Užsakyti"></td>
                <td colspan="2">Bendra suma</td>
                <td><input type="number"  min="0" max="999" class="suma_viso" id="suma_viso" onchange="" readonly></td>
              </tr>
              
             
            </tbody>
          </table>
		  </div>
            </form>
      </div>   
  
      </div>




  

<script type="text/javascript">
function change_total(){
  var sumos=document.getElementsByClassName("suma");
  var suma_viso=0;
//debugger;
  for(i=0;i<sumos.length;i++)
  {
    suma_viso=Number(suma_viso)+Number(sumos[i].value);
  }
  document.getElementById('suma_viso').value=suma_viso;

}
<?php
   }
   else{
     //..print_r($_POST);
     $rez=set_uzsakymas($_POST);
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
   }
?>
</script>
 <?php 
   include  'FixetFooter.php';
   ?>