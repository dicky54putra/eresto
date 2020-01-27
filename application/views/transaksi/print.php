<table align="center">
	<tr>
		<td colspan="5">
			<center>
				<h4>eRESTO | Kang DICKY</h4>
				<p>jalan Sekuro-Guyangan Km.3 Kawak Pakis aji Jepara</p>
				<p>Hp : 085200404996</p>
			</center>
		</td>
	</tr>
	<tr>
		<td colspan="5">
			===============================================
		</td>
	</tr>
	<tr>
		<th width="110">TANGGAL</th>
		<th width="10">:</th>
		<td colspan="3"><?= $transaksi['tanggal']; ?></td>
	</tr>
	<tr>
		<th>CUSTOMER</th>
		<th>:</th>
		<td colspan="3"><?= $transaksi['customer']; ?></td>
	</tr>
	<tr>
		<th>KASIR / STAFF</th>
		<th>:</th>
		<td colspan="3"><?= $user['nama_user']; ?></td>
	</tr>
	<tr>
		<td colspan="5">
			===============================================
		</td>
	</tr>
	<tr>
		<td colspan="5"><p class="font-20">Pesanan :</p></td>
	</tr>
	<tr>
		<th colspan="2" align="left">Pesanan</th>
		<th>Harga</th>
		<th><p align="right">Jumlah Pesanan</p></th>
		<th><p align="right">Jumlah Harga</p></th>
	</tr>
	<?php foreach ($detail as $key): ?>
	<tr>
		<td colspan="2"><?= $key['nama_masakan']; ?></td>
		<td width="60">Rp.<?= $key['harga']; ?></td>
		<td align="right">x<?= $key['jumlah_pesanan']; ?></td>
		<td align="right">Rp.<?= $key['jumlah_harga']; ?></td>
	</tr>
	<?php endforeach ?>
	<tr>
		<td colspan="5">
			===============================================
		</td>
	</tr>
	<tr>
		<td colspan="4" align="right">Total Transaksi :</td>
		<td align="right">Rp.<?= $cetak['harga']; ?></td>
	</tr>
	<tr>
		<td colspan="4" align="right">Uang Customer :</td>
		<td align="right">Rp.<?= $cetak['total_bayar']; ?></td>
	</tr>
	<tr>
		<td colspan="4" align="right">Kembalian :</td>
		<td align="right">Rp.<?= $cetak['kembalian']; ?></td>
	</tr>
	<tr>
		<td colspan="5">
			===============================================
		</td>
	</tr>
	<tr>
		<td colspan="5">
			<center><p>Terima kasih</p></center>
		</td>
	</tr>
	
</table>

<script>
    window.print();
</script>