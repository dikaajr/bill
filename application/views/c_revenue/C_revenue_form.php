<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pendapatan Lagu RBT</h3>
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
            <label for="int">Id Rbt <?php echo form_error('id_rbt') ?></label>
            <input type="text" class="form-control" name="id_rbt" id="id_rbt" placeholder="Id Rbt" value="<?php echo $id_rbt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Revenue <?php echo form_error('revenue') ?></label>
            <input type="text" class="form-control" name="revenue" id="revenue" placeholder="Revenue" value="<?php echo $revenue; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Month <?php echo form_error('month') ?></label>
            <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php echo $month; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Download <?php echo form_error('download') ?></label>
            <input type="text" class="form-control" name="download" id="download" placeholder="Download" value="<?php echo $download; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Renew <?php echo form_error('renew') ?></label>
            <input type="text" class="form-control" name="renew" id="renew" placeholder="Renew" value="<?php echo $renew; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Campaign <?php echo form_error('campaign') ?></label>
            <input type="text" class="form-control" name="campaign" id="campaign" placeholder="Campaign" value="<?php echo $campaign; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_revenue" value="<?php echo $id_revenue; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_revenue') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>