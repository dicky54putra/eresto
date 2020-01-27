    <section class="content">
        <div class="container-fluid">
            <div class="row">
        		<div class="rcol-lg-12 col-md-12 col-sm-12 col-xs-12">
        			<div class="card">
        				<div class="header">
        					<h2>Change Password</h2>
        				</div>
        				<div class="body">
        					<div class="row clearfix">
                                <div class="col-sm-12">
            						<?= $this->session->flashdata('message'); ?>
        							<form method="post" action="<?= base_url(); ?>admin/changepassword">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="password" class="form-control" placeholder="Curent Password" name="c_password" />
	                                        </div>
	                                    <?= form_error('c_password', '<small class="text-danger pl-3">', '</small>'); ?>
	                                    </div>
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="password" class="form-control" placeholder="New Password" name="password1" />
	                                        </div>
	                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
	                                    </div>
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <input type="password" class="form-control" placeholder="New Password" name="password2" />
	                                        </div>
	                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
	                                    </div>
	                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
	                                </form>
                                </div>
                            </div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </section>