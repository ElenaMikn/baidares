<?php
//global $servername, $username, $password, $dbname;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baidares";
/*
$servername = "localhost";
$username = "elen_test2";
$password = "test2Test2";
$dbname = "elen_test2";*/
//test2Test2
//traukiame info apie visus marsrutus
function get_marsrutai_all_info()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
   
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "SELECT id, pavadinimas, ilgis_km FROM marsrutas";
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        $maistas=get_maistas_all();
        while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - pavadinimas: " . $row["pavadinimas"]. " " . $row["ilgis_km"]. "<br>";
        $nakvyne=get_nakvyne_for_marsrutas($row["id"]);
        $rez[]=array("id" => $row["id"],"pavadinimas"=>$row["pavadinimas"],"ilgis_km" => $row["ilgis_km"],"maistas"=>$maistas,"nakvyne"=>$nakvyne);

        }
    }

    $conn->close();
    return $rez;
}

//traukima info apie viena marsruta
function get_marsrutas_info($marsruto_id)
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "SELECT id, pavadinimas, ilgis_km,kaina   FROM marsrutas where id=".$marsruto_id;
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        $maistas=get_maistas_all();
        while($row = $result->fetch_assoc()) {
        $nakvyne=get_nakvyne_for_marsrutas($row["id"]);
        $inventorius=get_inventorius_all();
        $rez=array("id" => $row["id"],"pavadinimas"=>$row["pavadinimas"],"ilgis_km" => $row["ilgis_km"],"kaina"=> $row["kaina"], "maistas"=>$maistas,"nakvyne"=>$nakvyne,"inventorius"=>$inventorius);

        }
    }

    $conn->close();
    return $rez;
}
function get_maistas_all()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "SELECT id, pavadinimas, kaina FROM maistas";
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $rez[]=$row;
        }
    }

    $conn->close();
    return $rez;
}
function get_inventorius_all()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "SELECT id, pavadinimas, kaina FROM inventorius";
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $rez[]=$row;
        }
    }

    $conn->close();
    return $rez;
}
function get_nakvyne_for_marsrutas($marsruto_id)
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "SELECT id, pavadinimas, kaina,vieta_gps,tel_numeris FROM nakvyne where marsruto_id=".$marsruto_id;
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $rez[]=$row;
        }
    }

    $conn->close();
    return $rez;
}
function set_uzsakymas($duom)
{
    if($duom["plaukimo_data"]=='')
    {
        return "Turi būti pasirinkta plaukimo datą. ";
    }
    if($duom["baidares_kiekis"]=='')
    {
        return "Turi būti pasirinktas plaukiančių žmonių kiekis.";
    }
	if($duom["plaukimo_data"]<date("Y-m-d"))
    {
        return "Pasirinkta plaukimo diena negali būti praėjusi.";
    }
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$i=0;
	$nakvyne_id=0;
	while(array_key_exists("nakvyne".$i,$duom))
	{
		if(array_key_exists("nakvyne_kiekis".$i,$duom))
		{
			if($duom["nakvyne_kiekis".$i]=="on")
			{
				$nakvyne_id=$duom["nakvyne".$i];
			}
		}
		$i++;
	}
    //$nakvyne_id=1;//todo
    $klientas_id = set_klientas($duom);
	if($nakvyne_id>0)
	{
		$sql = "INSERT into uzsakymas (marsruto_id, data,nakvynes_id,kiekis,klientas_id) values (".$duom["marsruto_id"].", '".$duom["plaukimo_data"]."',".$nakvyne_id.",".$duom["baidares_kiekis"].",".$klientas_id.") ";
	}
	else
	{
		$sql = "INSERT into uzsakymas (marsruto_id, data,kiekis,klientas_id) values (".$duom["marsruto_id"].", '".$duom["plaukimo_data"]."',".$duom["baidares_kiekis"].",".$klientas_id.") ";
		
	}

    if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
		set_maistas($duom,$last_id);
		set_inventorius($duom,$last_id);
        $conn->close();
       return 1;
    } else {
        // .$conn->close();
        return $conn->error;
    }
}
function set_klientas($duom)
{
	global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
	$sql = "INSERT into klientas (vardas, pavarde,tel_numeris,`e-pastas`) values ('".$duom["vardas"]."', '".$duom["pavarde"]."','".$duom["tel_numeris"]."','".$duom["epastas"]."') ";
    if ($conn->query($sql) === TRUE) {
         $last_id = $conn->insert_id;
       $conn->close();
		return  $last_id ;
    } else {
        // .$conn->close();
        return $conn->error;
    }
}
function set_maistas($duom, $usakymoNr)
{
	global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$i=0;
	while(array_key_exists("maistas".$i,$duom))
	{
		$sql = "INSERT into uzsakytas_maistas (uzsakymo_id, maisto_id,kiekis) values (".$usakymoNr.", ".$duom["maistas".$i].",".$duom["maistas_kiekis".$i].") ";
		 $result = $conn->query($sql);
		$i++;
	}
	$conn->close();

}
function set_inventorius($duom, $usakymoNr)
{
	global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$i=0;
	while(array_key_exists("inventorius".$i,$duom))
	{
		$sql = "INSERT into uzsakytas_inventorius (uzsakymo_id, inventoriaus_id,kiekis) values (".$usakymoNr.", ".$duom["inventorius".$i].",".$duom["inventorius_kiekis".$i].") ";
		 $result = $conn->query($sql);
		$i++;
	}
	$conn->close();

}
function set_nakvyne($duom)
{
	global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$sql = "INSERT into nakvyne (vardas, pavarde,tel_numeris,`e-pastas`) values ('".$duom["vardas"]."', '".$duom["pavarde"]."','".$duom["tel_numeris"]."','".$duom["epastas"]."') ";
    if ($conn->query($sql) === TRUE) {
         $last_id = $conn->insert_id;
       $conn->close();
		return  $last_id ;
    } else {
        // .$conn->close();
        return $conn->error;
    }
}

function delete_uzsakymas($uzsakymas_id)
{
	global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$sql = "DELETE from uzsakytas_inventorius where uzsakymo_id= ".$uzsakymas_id;
	if ($conn->query($sql) != TRUE) {
		 return $conn->error;
	 }
	
	$sql = "DELETE  from uzsakytas_maistas where uzsakymo_id= ".$uzsakymas_id;
	$result = $conn->query($sql);
	$sql = "DELETE from uzsakymas where id= ".$uzsakymas_id;
	$result = $conn->query($sql);
    
}
function get_uzsakymai()
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "select u.id,u.kiekis,u.data,m.id as m_id,m.pavadinimas,m.kaina,n.pavadinimas as nak_pav, k.vardas,k.pavarde,k.tel_numeris
    from uzsakymas u join marsrutas m on u.marsruto_id=m.id
    join klientas k on k.id=u.klientas_id
    left join  nakvyne n on u.nakvynes_id=n.id   order by u.data desc";
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $rez[]=$row;
        }
    }

    $conn->close();
    return $rez;
}

function get_uzsakymai_by_date($date)
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = "select u.id,u.kiekis,u.data,m.id as m_id,m.pavadinimas,m.kaina,n.pavadinimas as nak_pav, k.vardas,k.pavarde,k.tel_numeris
    from uzsakymas u join marsrutas m on u.marsruto_id=m.id
    join klientas k on k.id=u.klientas_id
    left join  nakvyne n on u.nakvynes_id=n.id where u.data='".$date."'  order by u.data desc";
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $rez[]=$row;
        }
    }

    $conn->close();
    return $rez;
}

function get_uzsakymas($id)
{
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$result = $conn->query("set names 'utf8'");
    $sql = " select u.id,u.kiekis,u.data,m.id as m_id,m.pavadinimas,m.kaina,n.pavadinimas as nak_pav, k.vardas,k.pavarde,k.tel_numeris
    from uzsakymas u join marsrutas m on u.marsruto_id=m.id
    join klientas k on k.id=u.klientas_id
    left join  nakvyne n on u.nakvynes_id=n.id where u.id=".$id;
    $result = $conn->query($sql);

    $rez=null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $rez[]=$row;
        }
    }

    $conn->close();
    return $rez;
}

function set_uzsakymas_data($id, $data, $kiekis)
{
	if($data=='')
    {
        return "Turi būti pasirinkta plaukimo datą. ";
    }
    if($kiekis=='')
    {
        return "Turi būti pasirinktas plaukiančių žmonių kiekis.";
    }
	if($data<date("Y-m-d"))
    {
        return "Galima keisti tik busimo plaukimo datą";
    }
	if($kiekis<=0)
    {
        return "Plaukiančių žmonių kiekis turi būti daugiau už 0";
    }
	global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	$sql = "update uzsakymas set data='".$data."', kiekis=".$kiekis." where id=".$id;
    if ($conn->query($sql) === TRUE) {
         
        $conn->close();
		return  1 ;
    } else {
        // .$conn->close();
        return $conn->error;
    }
	return 1;
}
?>