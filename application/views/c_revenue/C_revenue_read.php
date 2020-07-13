<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">T Revenue Detail</h3>
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
	    <tr><td>Id Rbt</td><td><?php echo $id_rbt; ?></td></tr>
	    <tr><td>Revenue</td><td><?php echo $revenue; ?></td></tr>
	    <tr><td>Month</td><td><?php echo $month; ?></td></tr>
	    <tr><td>Download</td><td><?php echo $download; ?></td></tr>
	    <tr><td>Renew</td><td><?php echo $renew; ?></td></tr>
	    <tr><td>Campaign</td><td><?php echo $campaign; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('c_revenue') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>