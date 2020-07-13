<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">T Pencipta Detail</h3>
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
	    <tr><td>Id Users</td><td><?php echo $id_users; ?></td></tr>
	    <tr><td>NamaPencipta</td><td><?php echo $namaPencipta; ?></td></tr>
	    <tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
	    <tr><td>Bankacc</td><td><?php echo $bankacc; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('c_pencipta') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>