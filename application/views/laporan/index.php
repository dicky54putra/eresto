<section class="content">
    <div class="container-fluid">

    	<div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Laporan</h2>
                    </div>
                    <div class="col-xs-6" align="right">
                        <a href="<?= base_url() ?>laporan/print" target="_BLANK">
                        <div class="demo-google-material-icon">
                            <i class="material-icons">print</i> 
                        </div>
                        </a>
                    </div>
                </div>                     
            </div>
            <div class="body">

                <div class="row">
                    <form method="post" action="">
                    <div class="col-xs-6">
                        <h2 class="card-inside-title">Range</h2>   
                        <!-- <div class="input-daterange input-group" id="bs_datepicker_range_container"> -->
                            <div class="form-line">
                                <input type="date" name="tanggal_awal" class="form-control" placeholder="Date start..." autocomplete="off">
                            </div>
                            <span>to</span>
                            <div class="form-line">
                                <input type="date" name="tanggal_akhir" class="form-control" placeholder="Date end..." autocomplete="off">
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-xs-6">
                        <br>  
                        <button type="submit" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </form>
                </div>

            	<div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped table-hover js-basic-example dataTable">
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
                        		<td><?php echo $key['tanggal_transaksi'] ?></td>
                        		<td><?php echo $key['harga'] ?></td>
                        		<td><?php echo $key['total_bayar'] ?></td>
                        		<td><?php echo $key['kembalian'] ?></td>
                        	</tr>
                       		<?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</section>