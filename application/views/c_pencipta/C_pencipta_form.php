<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> T_pencipta</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Users <?php echo form_error('id_users') ?></label>
            <input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaPencipta <?php echo form_error('namaPencipta') ?></label>
            <input type="text" class="form-control" name="namaPencipta" id="namaPencipta" placeholder="NamaPencipta" value="<?php echo $namaPencipta; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp <?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bankacc <?php echo form_error('bankacc') ?></label>
            <input type="text" class="form-control" name="bankacc" id="bankacc" placeholder="Bankacc" value="<?php echo $bankacc; ?>" />
        </div>
	    <input type="hidden" name="id_pencipta" value="<?php echo $id_pencipta; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_pencipta') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>