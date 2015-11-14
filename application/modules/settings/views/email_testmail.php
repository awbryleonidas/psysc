<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?=lang('modal_send_test_mail_title')?></h4>
</div>
<div class="modal-body">
	<p><?=$this->email->print_debugger();?></p>
</div> 
<div class="modal-footer">
	<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> <?=lang('button_close')?></button>
</div> 