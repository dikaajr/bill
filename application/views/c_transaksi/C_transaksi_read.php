<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">T Transaksi Detail</h3>
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
        <table class="table">
	    <tr><td>Id Revenue</td><td><?php echo $id_revenue; ?></td></tr>
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td>Tgl Dibuat</td><td><?php echo $tgl_dibuat; ?></td></tr>
	    <tr><td>Tgl Disetujui</td><td><?php echo $tgl_disetujui; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('c_transaksi') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>