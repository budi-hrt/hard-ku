<?php
$no = 1;
$dos = 0;
$bks = 0;
$res = 0;
$terjual = 0;
$total = 0;
$subtotal = 0;
foreach ($data as $t) {
  $banding = $t['banding'];
  $terjual = $t['awal'] - $t['akhir'];
  $total = $terjual * $t['harga_produk'];
  if ($t['awal'] >= $banding) {
    $dos = floor($t['awal'] / $banding);
    $res = $banding * $dos;
    $bks = $t['awal'] - $res;
  } else {
    $dos = 0;
    $bks = $t['awal'];
  }
  echo '
  <tr>
  <input type="hidden" class="idDetil"  value="' . $t['id_detil'] . '">
  <td>' . $no++ . '</td>
  <td class="text-uppercase">' . $t['nama_produk'] . '</td>
  <td class="harga text-center text-primary" data-pk="' . $t['id_detil'] . '"> ' . number_format($t['harga_produk'], 0, ',', '.') . '</td>';
  if ($t['retur'] == 'True') {
    echo '<td class="text-center text-danger">' . $dos . '</td>

 <td class="text-center text-danger">' . $bks . '</td>';
  } else {
    echo '
  <td class="dus text-center text-primary"  data-pk="' . $t['id_detil'] . '" data-name="' . $banding . ',' . $t['awal'] . ',' . $dos . '">' . $dos . '</td>
  
  <td class="bks text-center text-primary" data-pk="' . $t['id_detil'] . '" data-name="' . $banding . ',' . $t['awal'] . ',' . $dos . '">' . $bks . '</td>';
  }

  echo ' <td class="text-center">
  <a href="javascript:;" class="item-hapus text-danger" data-id="' . $t['id_detil'] . '" data-nama="' . $t['nama_produk'] . '">
  	<span class="red">
    <i class="ace-icon fa fa-trash-o bigger-120"></i>
   </span>
   </a>
   </td>
   <input type="hidden" class="total" value="' . $total . '">
  </tr>
  ';
  $subtotal += $total;
}
echo '<input type="hidden" name="subtotal" value="' . $subtotal . '">
';
