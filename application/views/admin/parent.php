<?php if($class_id != ""):?>
<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('parent_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
				<center>
                	<br />
                	<select name="class_id" onchange="window.location='<?php echo base_url();?>index.php?admin/parent/'+this.value">
                    	<option value=""><?php echo get_phrase('select_a_class');?></option>
						<?php 
                        $classes = $this->db->get('class')->result_array();
                        foreach($classes as $row):
                        ?>
                            <option value="<?php echo $row['class_id'];?>"
                            	<?php if($class_id == $row['class_id'])echo 'selected';?>>
                                	Class <?php echo $row['name'];?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    <br /><br />

                <?php if($class_id	!=	''):?>
                
                </center>
                <div class="box">
      				<div class="box-content">
                		<div id="dataTables">
                        <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                            <thead>
                                <tr>
                                    <th><div><?php echo get_phrase('roll');?></div></th>
                                    <th><div><?php echo get_phrase('student_name');?></div></th>
                                    <th><div><?php echo get_phrase('parent_name');?></div></th>
                                    <th><div><?php echo get_phrase('relation_with_student');?></div></th>
                                    <th><div><?php echo get_phrase('parent_email');?></div></th>
                                    <th><div><?php echo get_phrase('parent_phone');?></div></th>
                                    <th><div><?php echo get_phrase('parrent_address');?></div></th>
                                    <th><div><?php echo get_phrase('parrent_occupation');?></div></th>
                                    <th><div><?php echo get_phrase('options');?></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								foreach($students as $row):
									$parent_info	=	$this->db->get_where('parent' , array('student_id' => $row['student_id']))->row();
								?>
                                <tr>
                                    <td class="span1"><?php echo $row['roll'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td>
										<?php 
											if (isset($parent_info->name))
												echo $parent_info->name;
											else
												echo '-';
										?>
                                    </td>
                                    <td>
										<?php 
											if (isset($parent_info->relation_with_student))
												echo $parent_info->relation_with_student;
											else
												echo '-';
										?>
                                    </td>
                                    <td>
										<?php 
											if (isset($parent_info->email))
												echo $parent_info->email;
											else
												echo '-';
										?>
                                    </td>
                                    <td>
										<?php 
											if (isset($parent_info->phone))
												echo $parent_info->phone;
											else
												echo '-';
										?>
                                    </td>
                                    <td>
										<?php 
											if (isset($parent_info->address))
												echo $parent_info->address;
											else
												echo '-';
										?>
                                    </td>
                                    <td>
										<?php 
											if (isset($parent_info->profession))
												echo $parent_info->profession;
											else
												echo '-';
										?>
                                    </td>
                                    <td align="center" class="span5">
                                        <?php
											if (empty($parent_info)):
										?>
                                        <a  data-toggle="modal" href="#modal-form" onclick="modal('add_parent',<?php echo $row['student_id'];?>,<?php echo $class_id;?>)" 
                                        	class="btn btn-default btn-small">
                                            	<i class="icon-plus"></i> <?php echo get_phrase('add');?>
                                        </a>
                                        <?php
											else:
										?>
                                        <a  data-toggle="modal" href="#modal-form" onclick="modal('edit_parent',<?php echo $parent_info->parent_id;?>,<?php echo $class_id;?>)" 
                                        	class="btn btn-gray btn-small">
                                            	<i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                        </a>
                                        <a  data-toggle="modal" href="#modal-delete" 
                                        	onclick="modal_delete('<?php echo base_url();?>index.php?admin/parent/delete/<?php echo $parent_info->parent_id;?>/<?php echo $class_id;?>')" 
                                            	class="btn btn-red btn-small">
                                            		<i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                        </a>
                                        <?php
											endif;
										?>
                                        
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                		</div>
                    </div>
                </div>
                <?php endif;?>
			</div>
            <!----TABLE LISTING ENDS--->
		</div>
	</div>
</div>
<?php endif;?>
<?php if($class_id == ""):?>
<center>
<div class="span5" style="float:none !important;">
    <div class="box">
		<div class="box-header">
			<span class="title"> <i class="icon-info-sign"></i> Please select a class to manage parent.</span>
		</div>
		<div class="box-content padded">
            <br />
            <select name="class_id" onchange="window.location='<?php echo base_url();?>index.php?admin/parent/'+this.value">
                <option value=""><?php echo get_phrase('select_a_class');?></option>
                <?php 
                $classes = $this->db->get('class')->result_array();
                foreach($classes as $row):
                ?>
                    <option value="<?php echo $row['class_id'];?>"
                        <?php if($class_id == $row['class_id'])echo 'selected';?>>
                            Class <?php echo $row['name'];?></option>
                <?php
                endforeach;
                ?>
            </select>
            <hr />
            <script>
                $(document).ready(function() {
                    function ask()
                    {
                        Growl.info({title:"Select a class to manage parent",text:" "});
                    }
                    setTimeout(ask, 500);
                });
            </script>
		</div>
    </div>
</div>
</center>
<?php endif;?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>