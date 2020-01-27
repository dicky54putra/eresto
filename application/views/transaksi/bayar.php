<section class="content">
    <div class="container-fluid">
    	<div class="row clearfix">
	    	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
		    	<div class="card">

		        	<div class="header">
		        		<h2>TRANSAKSI</h2>
		        	</div>
		        	<div class="body">
		        		<div class="row clearfix">
		        			<div class="table-responsive">
		        			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        				<?= $this->session->flashdata('message'); ?>
		        				<p class="font-24">Customer : <b><?= $transaksi['customer']; ?></b></p>
			                    <form method="post" action="">
		                		<table class="table table-bordered table-striped table-hover dataTable">
			                        <thead>
			                            <tr>
			                                <th >NO</th>
			                                <th >PESANAN</th>
			                                <th >JUMLAH</th>
			                                <th >KETERANGAN</th>
			                                <th >HARGA</th>
			                            </tr>
			                        </thead>
			                        <?php $no = 1; ?>
			                        	<?php foreach ($detail as $key): ?>
			                        <tbody>
			                        		<tr>
			                        			<th scope="row"><?php echo $no++ ?></th>
			                        			<td>
			                        				<input type="hidden" name="id_user" value="<?php echo $transaksi['id_user'] ?>">
			                        				<input type="hidden" name="pesanan" value="<?php echo $transaksi['id_pesanan'] ?>">
			                        				<input type="hidden" name="nama_masakan" value="<?php echo $key['nama_masakan'] ?>">
			                        				<input type="hidden" name="id_meja" value="<?php echo $transaksi['id_meja'] ?>">
			                        				<?php echo $key['nama_masakan'] ?>
			                        			</td>
			                        			<td>
			                        				<input type="hidden" name="jumlah_pesanan" value="<?php echo $key['jumlah_pesanan'] ?>">
			                        				<?php echo $key['jumlah_pesanan'] ?>
			                        			</td>
			                        			<td>
			                        				<input type="hidden" name="keterangan" value="<?php echo $key['keterangan'] ?>">
			                        				<?php echo $key['keterangan'] ?>
			                        			</td>
			                        			<td>
			                        				<input type="hidden" name="harga" value="<?php echo 'Rp.'.$key['jumlah_harga'] ?>">
			                        				<?php echo 'Rp.'.$key['jumlah_harga'] ?>
			                        			</td>
			                        		</tr>
			                        </tbody>
			                        	<?php endforeach ?>
			                        <tfoot>
			                        	<tr>
			                        		<td colspan="4">Total Harga</td>
			                        		<td>
			                        			<input type="hidden" name="total_harga" value="<?php echo $jumlah_pesanan['jumlah_harga'];?>">
			                        			<?php echo 'Rp.'.$jumlah_pesanan['jumlah_harga'];?>
			                        		</td>
			                        	</tr>
			                        </tfoot>
			                        
			                    </table>
			                	</div>

			                    <br>
			                    <br>
		                            <input type="text" hidden="" name="id_pesanan" value="">
		                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		                            	<?php if ($transaksi['status_pesanan']=='0'): ?>
		                            		
		                                <div class="input-group">
		                                    <div class="form-line">
		                                        <input type="number" name="uang_customer" autocomplete="" class="form-control date" placeholder="Uang customer...">
		                                    </div>
		                                    <span  class="input-group-addon">
			                                    <button type="submit" class="input-group-addon">
			                                        <i class="material-icons" style="color: blue;" >input</i>
			                                    </button>
		                                    </span>
		                                </div>
		                                <?= form_error('uang_customer', '<small class="text-danger pl-3">', '</small>'); ?>
		                            	<?php endif ?>
		                            </div>
		                        </form>
		        			</div>
		                </div>
		        	</div>

		        </div>
	    	</div>

	    	<?php if ($transaksi['status_pesanan']=='1'): ?>	
	    	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
		    	<div class="card">

		        	<div class="header">
		        		<h2>STRUK</h2>
		        	</div>
		        	<div class="body">
		        		<div class="row clearfix">
		        			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        				<div class="table-responsive">
                                <table>
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
                            			<th colspan="2">Pesanan</th>
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
                                <a href="<?= base_url(); ?>transaksi/print/<?= $transaksi['id_pesanan'] ?>" target="_BLANK">
                                	<span  class="input-group-addon bg-pink">
                                       <i class="material-icons" style="color: white;" >print</i>
                                </span>
                                </a>

                            	</div>
		        			</div>
		                </div>
		        	</div>

		        </div>
	    	</div>
	    	<?php endif ?>
    	</div>




    </div>
</section>