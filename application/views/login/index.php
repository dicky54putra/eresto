<body class="login-page">    <div class="login-box">        <div class="logo">            <a href="javascript:void(0);">E<b>RESTO</b></a>            <small>Aplikasi kasir restoran</small>        </div>        <div class="card">            <div class="body">            	<?= $this->session->flashdata('message'); ?>                <form method="POST" action="<?= base_url('login'); ?>">                    <div class="msg">Sign in to start your session</div>                    <div class="input-group">                        <span class="input-group-addon">                            <i class="material-icons">person</i>                        </span>                        <div class="form-line">                            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>                        </div>                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>                    </div>                    <div class="input-group">                        <span class="input-group-addon">                            <i class="material-icons">lock</i>                        </span>                        <div class="form-line">                            <input type="password" class="form-control" name="password" placeholder="Password">                        </div>                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>                    </div>                    <div class="row">                        <!-- <div class="col-xs-3"></div> -->                        <div class="col-xs-12">                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>                        </div>                        <!-- <div class="col-xs-3"></div> -->                    </div>                </form>            </div>        </div>    </div>