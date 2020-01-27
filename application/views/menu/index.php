<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h2>Menu Masakan</h2>
            </div>
            <div class="body">
                <?= $this->session->flashdata('message'); ?>
                <button class="btn btn-primary tambah waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Menu Masakan</button>
                <br>
                <br>

                <?php if (empty($masakan)): ?>
                    <div class="alert alert-danger">
                        Data menu masakan tidak ditemukan!
                    </div>
                <?php endif ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th style="width: 5%;">NO</th>
                                <th>NAMA MENU</th>
                                <th>HARGA</th>
                                <th style="width: 10%;">STATUS</th>
                                <th style="width: 10%;">AKSI</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                        <?php $no = 1;  ?>

                        <?php foreach ($masakan as $menu):?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $menu['nama_masakan'] ?></td>
                                <td>Rp. <?php echo $menu['harga'] ?></td>
                                <td>
                                    <?php if ($menu['status_masakan'] == '1') { ?>
                                    <a href="<?= base_url();?>masakan/status/<?= $menu['id_masakan'] ?>" class="btn btn-primary">Ready</a>
                                    <?php }else if($menu['status_masakan'] == '0'){ ?>
                                    <a href="<?= base_url();?>masakan/status/<?= $menu['id_masakan'] ?>" class="btn btn-danger">Not Ready</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="" class="edit" data-toggle="modal" data-target="#defaultModal" data-id="<?= $menu['id_masakan']; ?>">
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                            <div class="demo-google-material-icon"style="color: green;"> <i class="material-icons">mode_edit</i></div>
                                        </div>
                                    </a>
                                    <a href="<?= base_url();?>masakan/hapus/<?= $menu['id_masakan'] ?>" onclick="return confirm('Anda yakin?')">
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                            <div class="demo-google-material-icon"> <i class="material-icons" style="color: red;">delete</i></div>
                                        </div>
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
        
</section>


<!-- Modal tambah -->
<div class="modal fade in" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title tombolTambahData" id="defaultModalLabel">Menu Makanan</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="<?= base_url('masakan'); ?>">
                <input type="hidden" name="id" id="id">
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Menu" required="">
                    </div>
                </div>

                <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-pink waves-effect">SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>

