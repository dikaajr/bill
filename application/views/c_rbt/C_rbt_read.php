<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">T Rbt Detail</h3>
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
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Artis</td><td><?php echo $artis; ?></td></tr>
	    <tr><td>PenciptaId</td><td><?php echo $penciptaId; ?></td></tr>
	    <tr><td>PartnerId</td><td><?php echo $partnerId; ?></td></tr>
	    <tr><td>KdTsel</td><td><?php echo $kdTsel; ?></td></tr>
	    <tr><td>KdXL</td><td><?php echo $kdXL; ?></td></tr>
	    <tr><td>KdIsat</td><td><?php echo $kdIsat; ?></td></tr>
	    <tr><td>KdM8</td><td><?php echo $kdM8; ?></td></tr>
	    <tr><td>KdFlexi</td><td><?php echo $kdFlexi; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('c_rbt') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>