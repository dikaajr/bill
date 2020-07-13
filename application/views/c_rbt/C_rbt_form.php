<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> T_rbt</h3>
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
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Artis <?php echo form_error('artis') ?></label>
            <input type="text" class="form-control" name="artis" id="artis" placeholder="Artis" value="<?php echo $artis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">PenciptaId <?php echo form_error('penciptaId') ?></label>
            <input type="text" class="form-control" name="penciptaId" id="penciptaId" placeholder="PenciptaId" value="<?php echo $penciptaId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">PartnerId <?php echo form_error('partnerId') ?></label>
            <input type="text" class="form-control" name="partnerId" id="partnerId" placeholder="PartnerId" value="<?php echo $partnerId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KdTsel <?php echo form_error('kdTsel') ?></label>
            <input type="text" class="form-control" name="kdTsel" id="kdTsel" placeholder="KdTsel" value="<?php echo $kdTsel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KdXL <?php echo form_error('kdXL') ?></label>
            <input type="text" class="form-control" name="kdXL" id="kdXL" placeholder="KdXL" value="<?php echo $kdXL; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KdIsat <?php echo form_error('kdIsat') ?></label>
            <input type="text" class="form-control" name="kdIsat" id="kdIsat" placeholder="KdIsat" value="<?php echo $kdIsat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KdM8 <?php echo form_error('kdM8') ?></label>
            <input type="text" class="form-control" name="kdM8" id="kdM8" placeholder="KdM8" value="<?php echo $kdM8; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KdFlexi <?php echo form_error('kdFlexi') ?></label>
            <input type="text" class="form-control" name="kdFlexi" id="kdFlexi" placeholder="KdFlexi" value="<?php echo $kdFlexi; ?>" />
        </div>
	    <input type="hidden" name="id_rbt" value="<?php echo $id_rbt; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_rbt') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>