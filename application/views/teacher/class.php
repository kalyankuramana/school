<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_data)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('edit_class');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_data))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('class_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_class');?>
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
                    <form method="post" action="<?php echo base_url();?>index.php?teacher/classes/do_update/<?php echo $row['class_id'];?>" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('numeric_name');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="name_numeric" value="<?php echo $row['name_numeric'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="controls">
                                    <select name="teacher_id" class="uniform" style="width:100%;">
                                    	<option value=""></option>
                                    	<?php 
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row2):
										?>
                                    		<option value="<?php echo $row2['teacher_id'];?>"
                                            	<?php if($row['teacher_id'] == $row2['teacher_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                                    	</option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_class');?></button>
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
                    		<th><div><?php echo get_phrase('class_name');?></div></th>
                    		<th><div><?php echo get_phrase('numeric_name');?></div></th>
                    		<th><div><?php echo get_phrase('teacher');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($classes as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['name_numeric'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?teacher/classes/edit/<?php echo $row['class_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-gray">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?teacher/classes/delete/<?php echo $row['class_id'];?>" onclick="return confirm('delete?')"
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
                    <form method="post" action="<?php echo base_url();?>index.php?teacher/class/create/" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name_numeric');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="name_numeric"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="controls">
                                    <select name="department_id" class="uniform" style="width:100%;">
                                    	<?php 
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row):
										?>
                                    		<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_class');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>