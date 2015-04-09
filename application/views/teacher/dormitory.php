<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_data)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('edit_dormitory');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_data))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('dormitory_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_dormitory');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
        	<?php if(isset($edit_data)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <form method="post" action="<?php echo base_url();?>index.php?teacher/dormitory/do_update/<?php echo $row['dormitory_id'];?>" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('dormitory_name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('number_of_room');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="number_of_room" value="<?php echo $row['number_of_room'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('description');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>
                                </div>
                            </div>
			            </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_dormitory');?></button>
                        </div>
                    </form>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----EDITING FORM ENDS--->
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('dormitory_name');?></div></th>
                    		<th><div><?php echo get_phrase('number_of_room');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($dormitories as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['number_of_room'];?></td>
							<td><?php echo $row['description'];?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?teacher/dormitory/edit/<?php echo $row['dormitory_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-gray">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?teacher/dormitory/delete/<?php echo $row['dormitory_id'];?>" onclick="return confirm('delete?')"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-red">
                                		<i class="icon-trash"></i>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <form method="post" action="<?php echo base_url();?>index.php?teacher/dormitory/create/" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('dormitory_name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('number_of_room');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="number_of_room"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('description');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_dormitory');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>