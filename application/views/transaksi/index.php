<section class="content">
    <div class="container-fluid">
    	<div class="card">
            <div class="header">
                <h2>Transaksi</h2>
            </div>
            <div class="body">
                <?= $this->session->flashdata('message'); ?>
                    <br>
                    <br>

                    <?php if (empty($Pesanan)): ?>
                        <div class="alert alert-danger">
                            Data Pesanan tidak ada!
                        </div>
                    <?php endif ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="width: 5%;">NO</th>
                                <th>NAMA CUSTOMER</th>
                                <th>USER</th>
                                <th style="width: 10%;">NOMOR MEJA</th>
                                <th>TANGGAL</th>
                                <th style="width: 10%;">STATUS</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                        <?php $no = 1;  ?>
                        <?php foreach ($Pesanan as $key):?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $key['customer'] ?></td>
                                <td><?php echo $key['nama_user'] ?></td>
                                <td><?php echo $key['no_meja'] ?></td>
                                <td><?php echo $key['tanggal'] ?></td>
                                <td>
                                    <?php if ($key['status_pesanan'] == '1') { ?>
                                    <a class="btn btn-primary" style="width: 100%;">Lunas</a>
                                    <!-- <?= base_url();?>transaksi/status/<?= $key['id_pesanan'] ?> -->
                                    <?php }else if($key['status_pesanan'] == '0'){ ?>
                                    <a href="<?= base_url();?>transaksi/bayar/<?= $key['id_pesanan'] ?>" class="btn btn-danger" style="width: 100%;">Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach ?>

                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
