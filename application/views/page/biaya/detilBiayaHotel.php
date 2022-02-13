<?php
$no = 1;
$hargahotel = 0;
$hari = 0;
$ttl_hargaHotel = 0;
$total_hari = 0;
$subtotalHotel = 0;
foreach ($data as $t) {
  $hargahotel = $t['harga_hotel'];
  $hari = $t['jumlah_hari'];
  // $ttl_harga = (round($harga * $liter, 4));
  $ttl_hargaHotel = $hargahotel * $hari;
  echo '
  <tr>
  <td class="text-uppercase">' . $no++ . '</td>
  <td class="harga text-center text-primary"> ' . number_format($hargahotel, 0, ',', '.') . '</td>
  <td class="harga text-center text-primary"> ' . $hari . '</td>
  <td class="harga text-center text-primary" > ' . number_format($ttl_hargaHotel, 0, ',', '.') . '</td>
  
  ';


  echo ' <td class="text-center">
    <a href="javascript:;" class="item-edit text-green" data-id="' . $t['id'] . '">
  	<span class="green">
    <i class="ace-icon fa fa-pencil bigger-120"></i>
   </span>
   </a>
    <a href="javascript:;" class="item-hapus text-danger" data-id="' . $t['id'] . '" >
  	<span class="red">
    <i class="ace-icon fa fa-trash-o bigger-120"></i>
   </span>
   </a>
   </td>
  
   
  </tr>

  ';
  $total_hari += $hari;
  $subtotalHotel += $ttl_hargaHotel;
}
echo '
    <tr>
    <td colspan="2" class="text-right"><h5><b>Total : </b></h5></td>
    <td class="text-center"><h5><b>' . $total_hari . '</b></h5></td>
    <td  class="text-center"><h5><b>' . number_format($subtotalHotel, 0, ',', '.')  . '</b></h5></td>
    <td ></td>
    </tr>
    <input type="hidden" class="total_hari" value="' . $total_hari . '">
    <input type="hidden" name="subtotal_hotel" value="' . $subtotalHotel . '">
';
