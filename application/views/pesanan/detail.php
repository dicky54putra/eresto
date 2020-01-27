<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>TAMBAH PESANAN</h2>
                    </div>

                    <div class="body">
                    	
                    	<div class="row clearfix">                    			
                    		<form method="post" action="">
                            <input type="text" hidden="" name="id_pesanan" value="<?= $pesanan['id_pesanan']; ?>">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p>
                                    <b>Pesanan</b>
                                </p>
                                <select class="form-control show-tick" name="nama_masakan">
                                    <option value="">Pilih Makanan</option>
                                    <?php foreach ($Detail_pesanan as $key): ?>
                                    <?php if ($key['status_masakan']=='1'){ ?>
                                    <option value="<?= $key['id_masakan'] ?>"><?= $key['nama_masakan']; ?></option>
                                    <?php } ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('nama_masakan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<p>
		                                    <b>Jumlah Pesanan</b>
		                                </p>
                                        <input type="number" name="jumlah_pesanan" class=" form-control" placeholder="Jumlah Pesanan...">
                                    </div>
                                        <?= form_error('jumlah_pesanan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    	<p>
		                                    <b>Keterangan</b>
		                                </p>
                                        <textarea name="keterangan" class="form-control no-resize auto-growth" placeholder="Keterangan..." autocomplete="" style="overflow: hidden; overflow-wrap: break-word; height: 46px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form">
                                        <button type="submit" class="btn bg-pink waves-effect">PESAN </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">

                	<div class="header">
                		<h2>PESANAN</h2>
                	</div>
                	<div class="body">
                		<div class="row clearfix">
                			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="table-responsive">

		                		<table class="table table-bordered table-striped table-hover dataTable">
			                        <thead>
			                            <tr>
			                                <th style="width: 5%;">NO</th>
			                                <th style="width: 25%;">PESANAN</th>
			                                <th style="width: 5%;">JUMLAH</th>
			                                <th >KETERANGAN</th>
			                                <th style="width: 5%;">HARGA</th>
			                            </tr>
			                        </thead>
			                        <?php $no = 1; ?>
			                        	<?php foreach ($detail as $key): ?>
			                        <tbody>
			                        		<tr>
			                        			<th scope="row"><?php echo $no++ ?></th>
			                        			<td><?php echo $key['nama_masakan'] ?></td>
			                        			<td><?php echo $key['jumlah_pesanan'] ?></td>
			                        			<td><?php echo $key['keterangan'] ?></td>
			                        			<td>
			                        				<?php 
			                        					echo 'Rp.'.$key['jumlah_harga']
			                        				 ?>
			                        			</td>
			                        		</tr>
			                        </tbody>
			                        	<?php endforeach ?>
			                        <tfoot>
			                        	<tr>
			                        		<td colspan="4">Total Harga</td>
			                        		<td>
			                        			<?php
			                        				echo 'Rp.'.$jumlah_pesanan['jumlah_harga'];
			                        			?>
			                        		</td>
			                        	</tr>
			                        </tfoot>
			                        
			                    </table>
                                </div>
                			</div>
		                </div>
                	</div>

                </div>
            </div>
        </div>
    </div>
</section>