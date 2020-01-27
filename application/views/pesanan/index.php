<section class="content">
    <div class="container-fluid">

    	<div class="card">
            <div class="header">
                <h2>Pesanan</h2>
            </div>
            <div class="body">
                <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url(); ?>pesanan/tambah" class="btn btn-primary tambah waves-effect m-r-20" >Tambah Pesanan</a>
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
                                <th style="width: 5%;">#</th>
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
                                <!-- <td>
                                    <?php if ($key['status_pesanan'] == '1') { ?>
                                    <a class="btn btn-primary">Sudah</a>
                                    <?php }else if($key['status_pesanan'] == '0'){ ?>
                                    <a href="<?= base_url();?>pesanan/status/<?= $key['id_pesanan'] ?>" class="btn btn-danger">Belom</a>
                                    <?php } ?>
                                </td> -->
                                <td>
                                    <a href="<?= base_url(); ?>pesanan/detail/<?= $key['id_pesanan'] ?>">
                                            <div class="demo-google-material-icon"style="color: green;"> <i class="material-icons">mode_edit</i></div>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>