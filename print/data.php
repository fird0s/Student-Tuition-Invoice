

<?php
// XLM Progressing
	$nim = "1301102010162";
	$key = "ry8378ufd";
	$xml_url = "http://ws.unsyiah.ac.id/webservice/mahasiswa/cmahasiswa/mhs/npm/$nim/key/$key";
	$xml = simplexml_load_file($xml_url);

?>

<?php
// Date formatting
date_default_timezone_set('Asia/Jakarta');
?>

<?php

// Qrcode generator
  include "phpqrcode/qrlib.php";
  $spp = number_format(floatval($xml->spp), 0,',','.');
  if ($xml){
    QRcode::png("$xml->npm / $xml->nama / Valid / $xml->status_aktif / Besaran UKT/SPP Rp. $spp  ", "qrcode.png", "L", 4, 4);
  }else{
    QRcode::png("$xml->npm / $xml->nama / TIDAK VALID", "qrcode.png", "L", 4, 4);
  }

?>


<html>
<head><title>Slip Pengganti Bukti Bayar UKT/SPP - Universitas Syiah Kuala</title></head>

<style type='text/css'>

  html{margin:40px 50px}

body { 
  	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
  }

  address {
    margin-bottom: 20px;
    font-style: normal;
    line-height: 1.42857143;
  }
  
  #container {
   width: 700px;
   margin: 0 auto;
	}

hr {
  	margin-top: 10px;
    margin-bottom: 10px;
    border: 0;
    border-top: 1px solid black;
  }	

.title {
  	    color: #333;
  	    font-weight: 700;
  	    font-size: 17px;
  	    line-height: 0.428571;
  }

  .value-title {
  	font-size: 19px;
  	line-height: 1;
  	font-weight: 300;
  }

</style>

<body>


<div id='container'>


<table style='width:100%'>
  <tr>
    <td style='width: 50%;'>
    	<img src='static/logo.png' width='300px;' style='margin-bottom: 10px;'>
		<address>
	       		<!-- <strong>Universitas Syiah Kuala </strong><br> -->
				Jln. Teuku Nyak Arief Darussalam 
				<br>Banda Aceh, Aceh, 23111 <br>
			 	<abbr title='Phone'>P:</abbr> 0651-6303969<br>
        www.unsyiah.ac.id
	    </address>
    </td>

    <td style='width: 50%;'>
    	<table style='margin-top: 60px; margin-left: 10px;'>
		  <tr>
		    <td style='text-align: right;'><b>Tanggal Cetak : </b></td>
		    <td><?php echo date("d/m/Y"); ?></td> 
		  </tr>
		  <tr>
		    <td style='text-align: right;'><b>Jam : </b></td>
		    <td><?php echo date('h:i:s'); ?></td> 
		  </tr>
		</table>
    </td> 
   </tr>
</table>



<hr>
<h3 style='text-align: center;'> SLIP PENGGANTI BUKTI BAYAR UKT/SPP</h3>
<hr>


<br>



<table style='width:100%'>
  <tr>
    <td style='width: 33.3%'>
    	<div>
		   <p class='title'>Nama</p>
		   <p class='value-title'><?php echo $xml->nama; ?></p>
		</div>
		
		<div style='margin-top: 30px;'>
		   <p class='title'>NPM</p>
		   <p class='value-title'><?php echo $xml->npm; ?></p>
		</div>

    </td>
     <td style='width: 33.3%'>

    	<div>
		   <p class='title'>Fakultas</p>
		   <p class='value-title'><?php echo $xml->fakultas; ?></p>
		</div>
	
		<div style='margin-top: 30px;'>
		   <p class='title'>Program Studi</p>
		   <p class='value-title'><?php echo $xml->jurusan; ?></p>
		</div>

    </td>
     <td style='width: 33.3%'>
    	<img src='qrcode.png' width='180px;' style='margin-bottom: 12px;'>
    </td>
  </tr>
</table>

<br>
<hr>
<footer>UPT TIK (Teknologi Informasi dan Komunikasi) - Universitas Syiah Kuala.<br>
www.ict.unsyiah.ac.id
</footer>

</div>

</body>

</html>



