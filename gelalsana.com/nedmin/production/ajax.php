<?php 
include '../netting/baglan.php';
$output='';
 
// Belirli veriyi seçme işlemi
$kategorisor2=$db->prepare("SELECT * FROM kategori where kategori_aile=".$_POST['id']);
$kategorisor2->execute();


$output= '<option value="">Alt kategori seç</option>';
while ($kategoricek2=$kategorisor2->fetch(PDO::FETCH_ASSOC)) { 

	 $output .= '<option value="'.$kategoricek2["kategori_id"].'">'.$kategoricek2["kategori_ad"].'</option>';
}


echo $output;

?>