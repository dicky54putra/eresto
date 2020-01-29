<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>TAMBAH PESANAN</h2>
                    </div>
                    <div class="body">
                        
                        <div class="row clearfix">
                            <form method="post" action="<?= base_url(); ?>pesanan/tambah">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nama" class=" form-control" placeholder="Nama Customer" >
                                    </div>
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <p>
                                    <b>Nomer Meja</b>
                                </p>
                                <select class="form-control show-tick" name="meja">
                                    <option value="">Pilih Makanan</option>
                                    <?php foreach ($Pesanan as $key): ?>
                                    <?php if ($key['status_meja']=='0'){ ?>
                                    <option value="<?= $key['id_meja'] ?>"><?= $key['no_meja']; ?></option>
                                    <?php } ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('meja', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-3">
                                <p>
                                    <b>User</b>
                                </p>
                                <select class="form-control show-tick" disabled="" name="user">
                                    <option value="<?= $user['id_user']; ?>"><?= $user['nama_user']; ?></option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group disabled">
                                    <p>
                                        <b>Tanggal</b>
                                    </p>
                                    <div class="form-line disabled">
                                        <?php date_default_timezone_set('Asia/Jakarta'); $tgl = date('d F Y h:i A', time()) ; ?>
                                        <input type="text" class="form-control" value="<?php echo $tgl; ?>" disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form">
                                        <button type="submit" style="width: 15%;" class="btn bg-pink waves-effect">SAVE </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>