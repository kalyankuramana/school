<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($edit_data)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('edit_invoice');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_data))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('invoice/payment_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_invoice/payment');?>
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
                    <form method="post" action="<?php echo base_url();?>index.php?teacher/invoice/do_update/<?php echo $row['invoice_id'];?>" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('student');?></label>
                                <div class="controls">
                                    <select name="student_id" class="chzn-select" style="width:400px;" >
                                    	<?php 
										$this->db->order_by('class_id','asc');
										$students = $this->db->get('student')->result_array();
										foreach($students as $row2):
										?>
                                    		<option value="<?php echo $row2['student_id'];?>"
                                            	<?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                                class <?php echo $this->crud_model->get_class_name($row2['class_id']);?> -
                                                roll <?php echo $row2['roll'];?> -
												<?php echo $row2['name'];?>
                                            </option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('title');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="title" value="<?php echo $row['title'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('description');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('amount');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="amount" value="<?php echo $row['amount'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('status');?></label>
                                <div class="controls">
                                    <select name="status" class="uniform" style="width:100%;">
                                    	<option value="paid" <?php if($row['status']=='paid')echo 'selected';?>><?php echo get_phrase('paid');?></option>
                                        <option value="unpaid" <?php if($row['status']=='unpaid')echo 'selected';?>><?php echo get_phrase('unpaid');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="date" 
                                    	value="<?php echo date('m/d/Y', $row['date']);?>"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_invoice');?></button>
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
                    		<th><div><?php echo get_phrase('student');?></div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('amount');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($invoices as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['amount'];?></td>
							<td>
								<span class="label label-<?php if($row['status']=='paid')echo 'green';else echo 'dark-red';?>"><?php echo $row['status'];?></span>
							</td>
							<td><?php echo date('d M,Y', $row['date']);?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?teacher/invoice/edit/<?php echo $row['invoice_id'];?>"
                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('edit');?>" class="btn btn-gray">
                                		<i class="icon-wrench"></i>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?teacher/invoice/delete/<?php echo $row['invoice_id'];?>" onclick="return confirm('delete?')"
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
                    <form method="post" action="<?php echo base_url();?>index.php?teacher/invoice/create/" class="form-horizontal validatable">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('student');?></label>
                                <div class="controls">
                                    <select name="student_id" class="chzn-select" style="width:400px;" >
                                    	<?php 
										$this->db->order_by('class_id','asc');
										$students = $this->db->get('student')->result_array();
										foreach($students as $row):
										?>
                                    		<option value="<?php echo $row['student_id'];?>">
                                                class <?php echo $this->crud_model->get_class_name($row['class_id']);?> -
                                                roll <?php echo $row['roll'];?> -
												<?php echo $row['name'];?>
                                            </option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('title');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="title"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('description');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('amount');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="amount"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('status');?></label>
                                <div class="controls">
                                    <select name="status" class="uniform" style="width:100%;">
                                    	<option value="paid"><?php echo get_phrase('paid');?></option>
                                        <option value="unpaid"><?php echo get_phrase('unpaid');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('date');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="date"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_invoice');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>