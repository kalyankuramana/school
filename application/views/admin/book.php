<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('book_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_book');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="action-nav-normal">
                <div class=" action-nav-button" style="width:300px;">
                  <a href="#">
                  	<img src="<?php echo base_url();?>template/images/icons/book.png" />
                    <span>Total <?php echo count($books);?> books</span>
                  </a>
                </div>
            </div>
            <div class="tab-pane box active" id="list">
					
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive box">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('book_name');?></div></th>
                    		<th><div><?php echo get_phrase('author');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('price');?></div></th>
                    		<th><div><?php echo get_phrase('class');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($books as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['author'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['price'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
							<td><span class="label label-<?php if($row['status']=='available')echo 'green';else echo 'dark-red';?>"><?php echo $row['status'];?></span></td>
							<td align="center">
                            	<a data-toggle="modal" href="#modal-form" onclick="modal('edit_book',<?php echo $row['book_id'];?>)" class="btn btn-gray btn-small">
                                		<i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                </a>
                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?admin/book/delete/<?php echo $row['book_id'];?>')"
                                	 class="btn btn-red btn-small">
                                		<i class="icon-trash"></i> <?php echo get_phrase('delete');?>
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
                	<?php echo form_open('admin/book/create' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('author');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="author"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('description');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('price');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="price"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('class');?></label>
                                <div class="controls">
                                    <select name="class_id" class="uniform" style="width:100%;">
                                    	<?php 
										$classes = $this->db->get('class')->result_array();
										foreach($classes as $row):
										?>
                                    		<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('status');?></label>
                                <div class="controls">
                                    <select name="status" class="uniform" style="width:100%;">
                                    	<option value="available"><?php echo get_phrase('available');?></option>
                                    	<option value="unavailable"><?php echo get_phrase('unavailable');?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_book');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>