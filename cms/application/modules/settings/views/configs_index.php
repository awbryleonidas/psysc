<div class="box">
    <div class="box-body">
        <span class="btn-actions">
            <a href="<?php echo site_url('settings/configs/form/add') ?>" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-success btn-add" id="btn_add">
                <span class="fa fa-plus"></span> <?php echo lang('button_add')?>
            </a>
        </span>
        <table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
            <thead>
                <tr>
                    <th class="none"><?php echo lang('config_id')?></th>
                    <th class="all"><?php echo lang('config_name')?></th>
                    <th class="min-tablet"><?php echo lang('config_value')?></th>
                    <th class="all"><?php echo lang('index_action')?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" class="dataTables_empty">
                        <img src="<?php echo assets_url('images/20.gif')?>" alt="<?php echo lang('loading')?>" />
                        <p><?php echo lang('loading')?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>