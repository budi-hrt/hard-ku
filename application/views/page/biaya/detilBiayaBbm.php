<?php
$no = 1;
$harga = 0;
$liter = 0;
$ttl_harga = 0;
$terjual = 0;
$total_liter = 0;
$subtotal = 0;
foreach ($data as $t) {
  $harga = $t['harga_bbm'];
  $liter = $t['jumlah_liter'];
  // $ttl_harga = (round($harga * $liter, 4));
  $ttl_harga = $harga * $liter;
  $ttl_harga = round($ttl_harga / 1000, 0) * 1000;
  echo '
  <tr>
  <input type="hidden" class="idDetil"  value="' . $t['id_detil'] . '">
  <td class="text-uppercase">' . date('d/m/y', strtotime($t['tanggal_isi']))  . '</td>
  <td class="harga text-center text-primary"> ' . $t['nama_bbm'] . '</td>
  <td class="harga text-center text-primary"> ' . number_format($t['harga_bbm'], 0, ',', '.') . '</td>
  <td class="text-center">' . $t['jumlah_liter'] . '</td>
  <td class="harga text-center text-primary" > ' . number_format($ttl_harga, 0, ',', '.') . '</td>
  
  ';


  echo ' <td class="text-center">
    <a href="javascript:;" class="item-edit text-green" data-id="' . $t['id_detil'] . '" data-nama="' . $t['nama_bbm'] . '">
  	<span class="green">
    <i class="ace-icon fa fa-pencil bigger-120"></i>
   </span>
   </a>
    <a href="javascript:;" class="item-hapus text-danger" data-id="' . $t['id_detil'] . '" data-nama="' . $t['nama_bbm'] . '">
  	<span class="red">
    <i class="ace-icon fa fa-trash-o bigger-120"></i>
   </span>
   </a>
   </td>
  
   
  </tr>

  ';
  $subtotal += $ttl_harga;
  $total_liter += $liter;
}
echo '
    <tr>
    <td colspan="3" class="text-right"><h5><b>Total : </b></h5></td>
    <td class="text-center"><h5><b>' . $total_liter . '</b></h5></td>
    <td  class="text-center"><h5><b>' . number_format($subtotal, 0, ',', '.')  . '</b></h5></td>
    <td ></td>
    </tr>
    <input type="hidden" class="total_Liter" value="' . $total_liter . '">
    <input type="hidden" name="subtotal_hargabbm" value="' . $subtotal . '">
';
