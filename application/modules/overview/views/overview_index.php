<section class="content">
    <div class="row">

        <div class="col-md-6">

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">1. Select Project</h3>
                </div>

                <div class="box-body">

                    <?php echo form_open(current_url(), array('class'=>'form-horizontal', 'role'=>'form'));?>
                    <label class="col-sm-1 control-label"> </label>
                    <div class="col-md-10">
                        <?php
                        $projects = array(
                            ''      => ' - none - ',
                            '2015'  => 'Milo Activ-Go'
                        );
                        ?>
                        <?php $campaign_name = $this->session->userdata('campaign_name');?>
                        <input type="text" class="input-sm form-control hide" name="date" id="date" value="<?php echo $campaign_name?>"/>
                        <?php echo form_dropdown('campaign_name', $projects, set_value('campaign_name', (isset($campaign_name) && $campaign_name != '' && !empty($campaign_name)) ? $campaign_name : ''), 'id="campaign_name" class="form-control"'); ?>
                        <div id="error_campaign_name"></div><br>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-8 control-label"> </label>
                        <div class="col-sm-3">
                            <button class="btn btn-success hide" type="submit" class="form-action">
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </div>
                    </div>

                </div>

                <div class="box-footer">

                </div>
            </div>


        </div>

        <div class="col-md-6">

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">2. Select Date</h3>
                </div>

                <div class="box-body">

                    <label class="col-sm-1 control-label"> </label>
                    <div class="col-sm-10">
                        <?php $campaign_start = $this->session->userdata('campaign_start');?>
                        <?php $campaign_end = $this->session->userdata('campaign_end');?>
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="campaign_start" id="campaign_start"
                                   value="<?php echo (isset($campaign_start) && $campaign_start != '' && !empty($campaign_start)) ? $campaign_start : ''?>"
                                   placeholder="<?php echo date('Y-m-d',strtotime(date('Y-m-d H:i:s',time()).' -30 days'))?>"/>
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control" name="campaign_end" id="campaign_end"
                                   value="<?php echo (isset($campaign_end) && $campaign_end != '' && !empty($campaign_end)) ? $campaign_end : ''?>"
                                   placeholder="<?php echo date('Y-m-d',time())?>"/>
                        </div>
                    </div><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-9 control-label"> </label>
                        <div class="col-sm-3">
                            <button class="btn btn-success" type="submit" class="form-action">
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </div>
                    </div>

                    <?php echo form_close();?>
                </div>

                <div class="box-footer">


                </div>
            </div>

        </div>


        <?php

        $campaign_ds = (isset($campaign_start) && $campaign_start != '' && !empty($campaign_start)) ? date("M d, Y", strtotime($campaign_start)) : date('M d, Y',strtotime(date('M d, Y',time()).' -30 days'));
        $campaign_de = (isset($campaign_end) && $campaign_end != '' && !empty($campaign_end)) ? date("M d, Y", strtotime($campaign_end))  : date('M d, Y',time());
        $dateStart = (isset($campaign_start) && $campaign_start != '' && !empty($campaign_start)) ? date("M d, Y", strtotime($campaign_start)) : date('M d, Y',strtotime(date('M d, Y',time()).' -30 days'));
        $dateEnd = (isset($campaign_end) && $campaign_end != '' && !empty($campaign_end)) ? date("M d, Y", strtotime($campaign_end)): date('M d, Y',time());
        ?>
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Results from <?php echo $campaign_ds?> to <?php echo $campaign_de?></h3>

                </div>

                <div class="box-body">
                    <?php if((trim($campaign_name)!='')):?>
                        <div id="container_chart" style="width:100%; height:400px;"></div><br><br>
                        <div style="position: absolute; right: 10%"><a href="details/export_raw_data/<?php echo date("Y-m-d", strtotime($dateStart)).'/'.date("Y-m-d", strtotime($dateEnd))?>">Export Raw Data To Excel File</a></div>
                    <?php else: ?>
                        You must first select specific project and a date range you want to view.
                    <?php endif;?>
                    <!--<div style="position: absolute; right: 10%"><a href="details/export_raw_data/<?php /*echo $dateStart.'/'.$dateEnd*/?>">Export Summary To Excel File</a></div>
                    <div id="container_chart" style="width:100%; height:400px;"></div>-->
                    <!--<div id="div_filter_region"></div>
                    <div id="bar-chart_region" style="height: 300px;"></div>-->
                    <?php //echo (isset($campaign_name))||$campaign_name!=''||!empty($campaign_name) ? $campaign_name: 'wala wala wala'?>
                </div>

                <div class="box-footer">

                </div>
                <br>
            </div>

        </div>


</section>
