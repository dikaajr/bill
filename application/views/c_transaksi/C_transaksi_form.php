<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> T_transaksi</h3>
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
            <label for="int">Id Revenue <?php echo form_error('id_revenue') ?></label>
            <input type="text" class="form-control" name="id_revenue" id="id_revenue" placeholder="Id Revenue" value="<?php echo $id_revenue; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Users <?php echo form_error('id_users') ?></label>
            <input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Dibuat <?php echo form_error('tgl_dibuat') ?></label>
            <input type="text" class="form-control" name="tgl_dibuat" id="tgl_dibuat" placeholder="Tgl Dibuat" value="<?php echo $tgl_dibuat; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgl Disetujui <?php echo form_error('tgl_disetujui') ?></label>
            <input type="text" class="form-control" name="tgl_disetujui" id="tgl_disetujui" placeholder="Tgl Disetujui" value="<?php echo $tgl_disetujui; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>