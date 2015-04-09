<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('system_settings');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content padded">
					<?php 
                    foreach($settings as $row):
                        ?>
                        <?php echo form_open('admin/system_settings/'.$row['type'].'/do_update/' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <form method="post" action="<?php echo base_url();?>index.php?admin/system_settings/<?php echo $row['type'];?>/do_update/" class="form-horizontal validatable">
                            
                                <div class="control-group">
                                    <label class="control-label"><?php echo get_phrase($row['type']);?></label>
                                    <div class="controls">
                                    
                                    	<!---RTL , LTR SETTINGS--->
                                        <?php
										if ( $row['type']	==	'text_direction' ):?>
                                        
                                        	<select name="description">
                                            
                                            	<option value="left_to_right" <?php if($row['description'] == 'left_to_right') echo 'selected';?> >
													<?php echo get_phrase('left_to_right');?></option>
                                                    
                                            	<option value="right_to_left" <?php if($row['description'] == 'right_to_left') echo 'selected';?> >
													<?php echo get_phrase('right_to_left');?></option>
                                                    
                                        	</select>
                                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('save');?></button>
                                        <?php continue; endif;?>
                                    	<!---RTL , LTR SETTINGS--->
                                        <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>
                                        <button type="submit" class="btn btn-blue"><?php echo get_phrase('save');?></button>
                                    </div>
                                </div>
                        </form>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>