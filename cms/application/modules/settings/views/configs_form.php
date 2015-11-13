<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only"><?php echo lang('button_close')?></span>
    </button>
    <h4 class="modal-title" id="myModalLabel"><?php echo $page_heading?></h4>
</div>
<div class="modal-body">
    <?php echo form_open(current_url(), array('id' => 'form', 'class'=>'form-horizontal'));?>
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo lang('config_name')?>:</label>
            <div class="col-sm-9">
                <?php echo form_input('config_name', set_value('config_name', (isset($record->config_name) ? $record->config_name : '')), 'class="form-control config_name" id="config_name"'); ?>
                <div id="error-config_name"></div>
                <?php if($page_type == 'edit'): ?>
                    <div class="help-text"><em>Do not change this name</em></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo lang('config_value')?>:</label>
            <div class="col-sm-9">
                <?php echo form_input('config_value', set_value('config_value', (isset($record->config_value) ? $record->config_value : '')), 'class="form-control config_value" id="config_value"'); ?>
                <div id="error-config_value"></div>
            </div>
        </div>
    <?php echo form_close();?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">
        <i class="fa fa-times"></i> <?php echo lang('button_close')?>
    </button>
    <?php if($page_type == 'add'): ?>
        <button id="submit" class="btn btn-success" type="submit">
            <i class="fa fa-save"></i> <?php echo lang('button_add')?>
        </button>
    <?php else: ?>
        <button id="submit" class="btn btn-success" type="submit">
            <i class="fa fa-save"></i> <?php echo lang('button_update')?>
        </button>
    <?php endif; ?>
</div>