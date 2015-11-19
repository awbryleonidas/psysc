<style>
.dropzone {
	margin: 0;
	padding: 0;
	border: 2px dashed rgba(0, 0, 0, 0.3);
	margin-bottom: 20px;
	width: 124px;
	min-height: 124px;
	/*margin-left: -10px;*/
	/*margin: 0 auto;*/
}

.dz-message span { display: none; }
.dz-message:after { content: 'Drag the file here or click to upload'; }
.dz-preview, .dz-complete { margin: 0 !important; padding: 0 !important; }
.dz-image { border-radius: 0 !important; }
</style>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only"><?=lang('button_close')?></span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><?=$page_heading?> <?php echo (isset($record)) ? " no. $record->feed_id" : '';?></h4>
</div>

<div class="modal-body">

	<div id="message" class="callout callout-danger callout-dismissable"></div>



	<div class="form-horizontal <?php //echo (isset($record)&&($record->feed_is_external)) ? 'hide' : ''; ?>">
		<p>Image must be cropped to square before uploading. This uploader will automatically resize the image to mobile and tablet sizes.</p>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_caption"><?=lang('label_image')?>:</label>
			<div class="col-sm-4">
				<?php echo form_open(site_url('content/feeds/upload'), array('class'=>'dropzone', 'id' => 'dropzone'));?>
					<input type="file" name="file" class="hide" />
				<?php echo form_close();?>
			</div>
			<div class="col-sm-6">
				<?php if (isset($record->feed_image_thumb)): ?>
					<img src="<?php echo (isset($record)&&($record->feed_is_external)) ? $record->feed_image_thumb : site_url($record->feed_image_thumb); ?>" width="120" />
				<?php endif; ?>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<div id="error_feed_image_thumb"></div>
			</div>
		</div>

	</div>


	<div class="clearfix"></div>

	<?php echo form_open(current_url(), array('class'=>'form-horizontal'));?>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_is_external"></label>
			<div class="col-sm-9">
				<div class="checkbox">
					<label>
						<input id="feed_is_external" name="feed_is_external" type="checkbox" value="1" <?php echo set_checkbox('feed_is_external', 1, ((!isset($record->feed_is_external) OR (integer)$record->feed_is_external == 0) OR ($page_type == 'add'))  ? FALSE : TRUE); ?> /> <?php echo 'Image from API'?>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_starts_on"><?=lang('label_start')?>:</label>
			<div class="col-sm-4">
				<?php $formdata = array('id'=>'feed_starts_on', 'name'=>'feed_starts_on', 'value'=>set_value('feed_starts_on', isset($record->feed_starts_on) ? $record->feed_starts_on : ''), 'class'=>'form-control'); ?>
				<?php echo form_input($formdata);?>
				<div id="error_feed_starts_on"></div>
			</div>

			<label class="col-sm-1 control-label" for="feed_ends_on"><?=lang('label_end')?>:</label>
			<div class="col-sm-4">
				<?php $formdata = array('id'=>'feed_ends_on', 'name'=>'feed_ends_on', 'value'=>set_value('feed_ends_on', isset($record->feed_ends_on) ? $record->feed_ends_on : ''), 'class'=>'form-control'); ?>
				<?php echo form_input($formdata);?>
				<div id="error_feed_ends_on"></div>
			</div>
		</div>


		<!--<div class="form-group hide">
			<label class="col-xs-2 control-label" for="feed_interest_id"><?/*=lang('label_interest')*/?>:</label>
			<div class="col-xs-9">
				<?php /*echo form_dropdown('feed_interest_id', $interests, set_value('feed_interest_id', (isset($record->feed_interest_id) && $record->feed_interest_id != '') ? $record->feed_interest_id : ''), 'id="feed_interest_id" class="form-control"'); */?>
				<div id="error_feed_interest_id"></div>
			</div>
		</div>-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_malls"><?=lang('label_mall_code')?>:</label>
			<div class="col-sm-9">
				<select id="select-malls" class="hide">
					<option value="0">All Malls</option>
					<?php foreach ($mall_names as $mall):?>
						<option value="<?php echo $mall->mall_id ?>"><?php echo $mall->mall_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_malls[]" id="feed_malls" class="populate-malls form-control"></select>
				<div id="error_feed_malls"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<script>
			var default_malls = <?php echo $current_malls?>;
		</script>

        <div class="form-group has-feedback feed_brand">
			<label class="col-sm-2 control-label" for="feed_brand"><?=lang('label_brand')?>:</label>
			<?php $formdata = array('id'=>'feed_brand', 'name'=>'feed_brand', 'value'=>set_value('feed_brand', isset($record->feed_brand) ? $record->feed_brand : ''), 'class'=>'form-control', 'placeholder' => 'Click and type the brand/store'); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
				<div id="error_feed_brand"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_caption"><?=lang('label_caption')?>:</label>
			<div class="col-sm-9">
				<?php $formdata = array('id'=>'feed_caption', 'name'=>'feed_caption', 'rows'=>'3', 'value'=>set_value('feed_caption', isset($record->feed_caption) ? $record->feed_caption : ''), 'class'=>'form-control'); ?>
				<?php echo form_textarea($formdata); ?>
				<div id="error_feed_caption"></div>
			</div>
		</div>


		<div class="form-group has-feedback feed_link">
			<label class="col-sm-2 control-label" for="feed_link"><?=lang('label_link')?>:</label>
			<?php $formdata = array('id'=>'feed_link', 'name'=>'label_link', 'value'=>set_value('feed_link', isset($record->feed_link) ? $record->feed_link : ''), 'class'=>'form-control', 'placeholder' => ''); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<div id="error_feed_link"></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-2 control-label" for="feed_type"><?=lang('label_feed_type')?>:</label>
			<div class="col-xs-9">
				<?php $alert_type = array(
					'1' => 'Default', '2' => 'Movie', '3' => 'Coupon',  '4' => 'Non-locate',
				);?>
				<?php echo form_dropdown('feed_type', $alert_type, set_value('feed_type', (isset($record->feed_type) && $record->feed_type != '') ? $record->feed_type : ''), 'id="feed_type" class="form-control" onchange="valueChanged()"'); ?>
				<div id="error_feed_type"></div>
			</div>
		</div>
		<div class="form-group has-feedback movie hide">
			<label class="col-sm-2 control-label" for="feed_movie_id"><?=lang('label_movie')?>:</label>
			<?php $formdata = array('id'=>'feed_movie_id', 'name'=>'feed_movie_id', 'value'=>set_value('feed_movie_id', isset($movie->movie_title) ? $movie->movie_title : ''), 'class'=>'form-control', 'placeholder' => 'Click and type the Movie Title'); ?>
			<div class="col-sm-9">
				<?php echo form_input($formdata); ?>
				<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
				<div id="error_feed_movie_id"></div>
			</div>
		</div>


		<div class="form-group coupon hide">
			<label class="col-xs-2 control-label" for="feed_coupon_id"><?=lang('label_coupon')?>:</label>
			<div class="col-xs-9">
				<?php echo form_dropdown('feed_coupon_id', $coupons, set_value('feed_coupon_id', (isset($record->feed_coupon_id) && $record->feed_coupon_id != '') ? $record->feed_coupon_id : ''), 'id="feed_coupon_id" class="form-control"'); ?>
				<div id="error_feed_coupon_id"></div>
			</div>
		</div>

	<?php //pr($current_subcategories);?>
		<div class="form-group">
			<label class="col-xs-2 control-label" for="feed_category"><?=lang('label_feed_category')?>:</label>
			<div class="col-xs-9">
				<?php $feed_category = array(
					'' => '	', '1' => 'FOOD', '2' => 'FASHION', '3' => 'BEAUTY, HEALTH & WELLNESS', '4' => 'SPECIALTY SHOPS', '5' => 'HOME & OFFICE',
					'6' => 'GAMES & GADGETS', '7' => 'SERVICES', '8' => 'AMUSEMENT & RECREATION', '9' => 'GROCERY', '10' => 'MOVIES', '11' => 'OTHERS',
				);?>
				<?php echo form_dropdown('feed_category', $feed_category, set_value('feed_category', (isset($record->feed_category) && $record->feed_category != '') ? $record->feed_category : ''), 'id="feed_category" class="form-control" onchange="categoryChanged()"'); ?>
				<div id="error_feed_category"></div>
			</div>
		</div>
		<div class="form-group 1 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_1">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_1" id="select-subcategories_1" class="hide">
					<?php foreach ($subcategories_1 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_1[]" id="feed_subcategories_1" class="populate-subcategories_1 form-control"></select>
				<div id="error_feed_subcategories_1"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 2 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_2">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_2" id="select-subcategories_2" class="hide">
					<?php foreach ($subcategories_2 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_2[]" id="feed_subcategories_2" class="populate-subcategories_2 form-control"></select>
				<div id="error_feed_subcategories_2"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 3 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_3">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_3" id="select-subcategories_3" class="hide">
					<?php foreach ($subcategories_3 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_3[]" id="feed_subcategories_3" class="populate-subcategories_3 form-control"></select>
				<div id="error_feed_subcategories_3"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 4 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_4">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_4" id="select-subcategories_4" class="hide">
					<?php foreach ($subcategories_4 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_4[]" id="feed_subcategories_4" class="populate-subcategories_4 form-control"></select>
				<div id="error_feed_subcategories_4"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 5 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_5">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_5" id="select-subcategories_5" class="hide">
					<?php foreach ($subcategories_5 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_5[]" id="feed_subcategories_5" class="populate-subcategories_5 form-control"></select>
				<div id="error_feed_subcategories_5"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 6 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_6">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_6" id="select-subcategories_6" class="hide">
					<?php foreach ($subcategories_6 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_6[]" id="feed_subcategories_6" class="populate-subcategories_6 form-control"></select>
				<div id="error_feed_subcategories_6"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 7 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_7">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories" id="select-subcategories_7" class="hide">
					<?php foreach ($subcategories_7 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_7[]" id="feed_subcategories_7" class="populate-subcategories_7 form-control"></select>
				<div id="error_feed_subcategories_7"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 8 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_8">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_8" id="select-subcategories_8" class="hide">
					<?php foreach ($subcategories_8 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_8[]" id="feed_subcategories_8" class="populate-subcategories_8 form-control"></select>
				<div id="error_feed_subcategories_8"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 9 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_9">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories" id="select-subcategories_9" class="hide">
					<?php foreach ($subcategories_9 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_9[]" id="feed_subcategories_9" class="populate-subcategories_9 form-control"></select>
				<div id="error_feed_subcategories_9"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 10 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_10">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_10" id="select-subcategories_10" class="hide">
					<?php foreach ($subcategories_10 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_10[]" id="feed_subcategories_10" class="populate-subcategories_10 form-control"></select>
				<div id="error_feed_subcategories_10"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
		<div class="form-group 11 subcat hide">
			<label class="col-sm-2 control-label" for="feed_subcategories_11">Subcategory:</label>
			<div class="col-sm-9">
				<select name="select-subcategories_11" id="select-subcategories_11" class="hide">
					<?php foreach ($subcategories_11 as $subcategory):?>
						<option value="<?php echo $subcategory->subcategory_id ?>"><?php echo $subcategory->subcategory_name ?></option>
					<?php endforeach; ?>
				</select>
				<select multiple name="feed_subcategories_11[]" id="feed_subcategories_11" class="populate-subcategories_11 form-control"></select>
				<div id="error_feed_subcategories_11"></div>
				<div class="help-text"><?=lang('text_form_groups')?></div>
			</div>
		</div>
	<script>
		var default_subcategories = <?php echo $current_subcategories?>;
	</script>

	<script type="text/javascript">
		$(document).ready(function()
		{
			if ($('#feed_type').val()==2)//movie
			{
				$('.movie').removeClass('hide');
				$('.coupon').addClass('hide');
			}
			else if ($('#feed_type').val()==3)//coupon
			{
				$('.coupon').removeClass('hide');
				$('.movie').addClass('hide');
			}
			else if ($('#feed_type').val()==4)//non-locate
			{
				$('.movie').addClass('hide');
				$('.coupon').addClass('hide');
			}
			else
			{
				$('.movie').addClass('hide');
				$('.coupon').addClass('hide');
			}

			var feed_category = $('#feed_category').val();
			$('.subcat').addClass('hide');
			if(feed_category!='')
			{
				$('.' + feed_category).removeClass('hide');
			}
		});

		function valueChanged()
		{
			if ($('#feed_type').val()==2)//movie
			{
				$('.movie').removeClass('hide');
				$('.coupon').addClass('hide');
			}
			else if ($('#feed_type').val()==3)//coupon
			{
				$('.coupon').removeClass('hide');
				$('.movie').addClass('hide');
			}
			else if ($('#feed_type').val()==4)//non-locate
			{
				$('.movie').addClass('hide');
				$('.coupon').addClass('hide');
			}
			else
			{
				$('.movie').addClass('hide');
				$('.coupon').addClass('hide');
			}
		}

		function categoryChanged()
		{
			var feed_category = $('#feed_category').val();
			$('.subcat').addClass('hide');
			$('.' + feed_category).removeClass('hide');
		}
	</script>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_brand_feed"></label>
			<div class="col-sm-9">
				<div class="checkbox">
					<label>
						<input id="feed_brand_feed" name="feed_brand_feed" type="checkbox" value="1" <?php echo set_checkbox('feed_brand_feed', 1, ((isset($record->feed_brand_feed) AND (integer)$record->feed_brand_feed == 0) OR ($page_type == 'add'))  ? FALSE : TRUE); ?> /> <?=lang('label_feed_brand_feed')?>
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_featured_feed"></label>
			<div class="col-sm-9">
				<div class="checkbox">
					<label>
						<input id="feed_featured_feed" name="feed_featured_feed" type="checkbox" value="1" <?php echo set_checkbox('feed_featured_feed', 1, ((isset($record->feed_featured_feed) AND (integer)$record->feed_featured_feed == 0) OR ($page_type == 'add'))  ? FALSE : TRUE); ?> /> <?=lang('label_feed_featured_feed')?>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="feed_active"></label>
			<div class="col-sm-9">
				<div class="checkbox">
					<label>
						<input id="feed_active" name="feed_active" type="checkbox" value="1" <?php echo set_checkbox('feed_active', 1, ((isset($record->feed_active) && $record->feed_active == 'Active') OR ($page_type == 'add'))  ? TRUE : FALSE); ?> /> <?=lang('label_active')?>
					</label>
				</div>
			</div>
		</div>

		<div class="form-group hide">
			<label class="col-sm-2 control-label" for="feed_active">Hide These:</label>
			<div class="col-sm-9">
				<?php echo form_input(array('id'=>'feed_image_thumb', 'name'=>'feed_image_thumb', 'value'=>set_value('feed_image_thumb', isset($record->feed_image_thumb) ? $record->feed_image_thumb : ''), 'class'=>'form-control'));?>
				<?php echo form_input(array('id'=>'feed_image_small', 'name'=>'feed_image_small', 'value'=>set_value('feed_image_small', isset($record->feed_image_small) ? $record->feed_image_small : ''), 'class'=>'form-control'));?>
				<?php echo form_input(array('id'=>'feed_image_medium', 'name'=>'feed_image_medium', 'value'=>set_value('feed_image_medium', isset($record->feed_image_medium) ? $record->feed_image_medium : ''), 'class'=>'form-control'));?>
				<?php echo form_input(array('id'=>'feed_image_large', 'name'=>'feed_image_large', 'value'=>set_value('feed_image_large', isset($record->feed_image_large) ? $record->feed_image_large : ''), 'class'=>'form-control'));?>
				<?php echo form_input(array('id'=>'feed_image_xlarge', 'name'=>'feed_image_xlarge', 'value'=>set_value('feed_image_xlarge', isset($record->feed_image_xlarge) ? $record->feed_image_xlarge : ''), 'class'=>'form-control'));?>
			</div>
		</div>



	<?php echo form_close();?>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-times"></i> <?=lang('button_close')?>
	</button>
	<?php if ($page_type == 'add'): ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_add')?>
		</button>
	<?php else: ?>
		<button id="submit" class="btn btn-success" type="submit">
			<i class="fa fa-save"></i> <?=lang('button_update')?>
		</button>
	<?php endif; ?>
</div>

<script>
Dropzone.autoDiscover = false;
$(function(){

	var opts=$("#select-malls").html(), opts2="<option></option>"+opts;
	$("select.populate-malls").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts2:opts); });
	$("#feed_malls").select2();
	$('#feed_malls').data().select2.updateSelection(default_malls);

	var opts3_1=$("#select-subcategories_1").html(), opts4_1="<option></option>"+opts3_1;
	$("select.populate-subcategories_1").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_1:opts3_1); });
	$("#feed_subcategories_1").select2();
	$('#feed_subcategories_1').data().select2.updateSelection(default_subcategories);

	var opts3_2=$("#select-subcategories_2").html(), opts4_2="<option></option>"+opts3_2;
	$("select.populate-subcategories_2").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_2:opts3_2); });
	$("#feed_subcategories_2").select2();
	$('#feed_subcategories_2').data().select2.updateSelection(default_subcategories);

	var opts3_3=$("#select-subcategories_3").html(), opts4_3="<option></option>"+opts3_3;
	$("select.populate-subcategories_3").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_3:opts3_3); });
	$("#feed_subcategories_3").select2();
	$('#feed_subcategories_3').data().select2.updateSelection(default_subcategories);

	var opts3_4=$("#select-subcategories_4").html(), opts4_4="<option></option>"+opts3_4;
	$("select.populate-subcategories_4").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_4:opts3_4); });
	$("#feed_subcategories_4").select2();
	$('#feed_subcategories_4').data().select2.updateSelection(default_subcategories);

	var opts3_5=$("#select-subcategories_5").html(), opts4_5="<option></option>"+opts3_5;
	$("select.populate-subcategories_5").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_5:opts3_5); });
	$("#feed_subcategories_5").select2();
	$('#feed_subcategories_5').data().select2.updateSelection(default_subcategories);

	var opts3_6=$("#select-subcategories_6").html(), opts4_6="<option></option>"+opts3_6;
	$("select.populate-subcategories_6").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_6:opts3_6); });
	$("#feed_subcategories_6").select2();
	$('#feed_subcategories_6').data().select2.updateSelection(default_subcategories);

	var opts3_7=$("#select-subcategories_7").html(), opts4_7="<option></option>"+opts3_7;
	$("select.populate-subcategories_7").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_7:opts3_7); });
	$("#feed_subcategories_7").select2();
	$('#feed_subcategories_7').data().select2.updateSelection(default_subcategories);

	var opts3_8=$("#select-subcategories_8").html(), opts4_8="<option></option>"+opts3_8;
	$("select.populate-subcategories_8").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_8:opts3_8); });
	$("#feed_subcategories_8").select2();
	$('#feed_subcategories_8').data().select2.updateSelection(default_subcategories);

	var opts3_9=$("#select-subcategories_9").html(), opts4_9="<option></option>"+opts3_9;
	$("select.populate-subcategories_9").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_9:opts3_9); });
	$("#feed_subcategories_9").select2();
	$('#feed_subcategories_9').data().select2.updateSelection(default_subcategories);

	var opts3_10=$("#select-subcategories_10").html(), opts4_10="<option></option>"+opts3_10;
	$("select.populate-subcategories_10").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_10:opts3_10); });
	$("#feed_subcategories_10").select2();
	$('#feed_subcategories_10').data().select2.updateSelection(default_subcategories);

	var opts3_11=$("#select-subcategories_11").html(), opts4_11="<option></option>"+opts3_11;
	$("select.populate-subcategories_11").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts4_11:opts3_11); });
	$("#feed_subcategories_11").select2();
	$('#feed_subcategories_11').data().select2.updateSelection(default_subcategories);

	//set_form();

	var myDropzone = new Dropzone("#dropzone");
    myDropzone.on("success", function(file, response) {
    	o = jQuery.parseJSON(response);
        $('#feed_image_thumb').val(o.thumb);
        $('#feed_image_small').val(o.small);
        $('#feed_image_medium').val(o.medium);
        $('#feed_image_large').val(o.large);
        $('#feed_image_xlarge').val(o.xlarge);
    });


	$('#feed_starts_on, #feed_ends_on').datetimepicker({
        format: 'yyyy-mm-dd hh:ii:ss', 
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });

    // brand
    $('#feed_brand').autocomplete({
        source: site_url + 'content/brands/search',
        minLength: 2,
    });
    $('#feed_movie_id').autocomplete({
        source: site_url + 'content/movies/search',
        minLength: 2,
    });

	$('#submit').click(function(e){
		var feed_category = $('#feed_category').val();
		//alert($('#feed_malls').val());
		e.preventDefault();

		var ajax_url = "<?php echo current_url(); ?>";
		var ajax_load = '<span class="help-block text-center">Loading...</span>';
		$(ajax_load).load(ajax_url, {
			//'feed_interest_id': $('#feed_interest_id').val(),
			'feed_mall_code': $('#feed_mall_code').val(),
			'feed_caption': $('#feed_caption').val(),
			'feed_starts_on': $('#feed_starts_on').val(),
			'feed_ends_on': $('#feed_ends_on').val(),
			'feed_brand': $('#feed_brand').val(),
			'feed_link': $('#feed_link').val(),
			'feed_active': $('#feed_active').prop('checked') ? 1 : 0,
			'feed_brand_feed': $('#feed_brand_feed').prop('checked') ? 1 : 0,
			'feed_featured_feed': $('#feed_featured_feed').prop('checked') ? 1 : 0,
			'feed_is_external': $('#feed_is_external').prop('checked') ? 1 : 0,
			'feed_type': $('#feed_type').val(),
			'feed_movie_id': $('#feed_movie_id').val(),
			'feed_image_thumb': $('#feed_image_thumb').val(),
			'feed_image_small': $('#feed_image_small').val(),
			'feed_image_medium': $('#feed_image_medium').val(),
			'feed_image_large': $('#feed_image_large').val(),
			'feed_image_xlarge': $('#feed_image_xlarge').val(),
			'feed_malls': $('#feed_malls').val(),
			'feed_category': $('#feed_category').val(),
			'feed_subcategories': $('#feed_subcategories' + '_' + feed_category ).val(),
			'feed_coupon_id': $('#feed_coupon_id').val(),
		}, function(data){
			var o = jQuery.parseJSON(data);
			if (o.success === false) {
				$('#message').show();
				$('#message').html(o.message);
				if (o.errors) {
					for (var form_name in o.errors) {
						$('#error_' + form_name).html(o.errors[form_name]);
					}
				}
			}
			else
			{
				$('#datatables').dataTable().fnDraw();
				$('#modal').modal('hide');
				alertify.success("<?php echo ($page_type == 'add') ? lang('add_success') : lang('edit_success'); ?>");
			}

			console.log(data);
		});
	});

	$('#message').hide();

	$('form input').keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});
});

</script>