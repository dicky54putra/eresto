<table border="1" cellspacing="0" align="center">
    <thead>
        <tr>
            <th style="width: 5%;">NO</th>
            <th>NAMA CUSTOMER</th>
            <th>USER</th>
            <th>NOMOR MEJA</th>
            <th>TANGGAL</th>
            <th>TOTAL HARGA</th>
            <th>TOTAL BAYAR</th>
            <th>KEMBALIAN</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		$no = 1;
    		foreach ($Pesanan as $key):
    	?>
    	<tr>
    		<th scope="row"><?php echo $no++ ?></th>
    		<td><?php echo $key['customer'] ?></td>
    		<td><?php echo $key['nama_user'] ?></td>
    		<td><?php echo $key['no_meja'] ?></td>
    		<td><?php echo $key['tanggal'] ?></td>
    		<td><?php echo $key['harga'] ?></td>
    		<td><?php echo $key['total_bayar'] ?></td>
    		<td><?php echo $key['kembalian'] ?></td>
    	</tr>
   		<?php endforeach ?>
    </tbody>
</table>

<script>
    window.print();
</script>