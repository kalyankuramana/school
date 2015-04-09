<?php if($class_id != ""):?>
<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('student_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					<?php echo get_phrase('add_student');?>
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
                	<select name="class_id" onchange="window.location='<?php echo base_url();?>index.php?teacher/student/'+this.value">
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
					<?php if($class_id	==	''):?>
                        <div id="ask_class" class="  alert alert-info  " style="width:300px;">
                            <i class="icon-info-sign"></i> Please select a class to manage student.
                        </div>
                        <script>
						$(document).ready(function() {
						  	
						   	function shake()
						  	{
								$( "#ask_class" ).effect( "shake" );
						  	}
						  	setTimeout(shake, 500);
						});
						</script>
                        <br /><br />
                    <?php endif;?>
                <?php if($class_id	!=	''):?>
                
                    <div class="action-nav-normal">
                        <div class=" action-nav-button" style="width:300px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/user.png" />
                            <span>Total <?php echo count($students);?> students</span>
                          </a>
                        </div>
                    </div>
                </center>
                <div class="box">
      				<div class="box-content">
                		<div id="dataTables">
                        <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                            <thead>
                                <tr>
                                    <th><div><?php echo get_phrase('roll');?></div></th>
                                    <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                                    <th><div><?php echo get_phrase('student_name');?></div></th>
                                    <th class="span3"><div><?php echo get_phrase('address');?></div></th>
                                    <th><div><?php echo get_phrase('email');?></div></th>
                                    <th><div><?php echo get_phrase('options');?></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;foreach($students as $row):?>
                                <tr>
                                    <td class="span1"><?php echo $row['roll'];?></td>
                                    <td><div class="avatar"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="avatar-medium" /></div></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td align="center" class="span5">
                                        
                                        
                                        <a  data-toggle="modal" href="#modal-form" onclick="modal('student_profile',<?php echo $row['student_id'];?>)" class="btn btn-default btn-small">
                                            <i class="icon-user"></i> <?php echo get_phrase('profile');?>
                                        </a>
                                        <a  data-toggle="modal" href="#modal-form" onclick="modal('student_academic_result',<?php echo $row['student_id'];?>)" class="btn btn-default btn-small">
                                            <i class="icon-file-alt"></i> <?php echo get_phrase('marksheet');?>
                                        </a>
                                        <a  data-toggle="modal" href="#modal-form" onclick="modal('student_id_card',<?php echo $row['student_id'];?>)" class="btn btn-default btn-small">
                                            <i class="icon-credit-card"></i> <?php echo get_phrase('id_card');?>
                                        </a>
                                        <a  data-toggle="modal" href="#modal-form" onclick="modal('edit_student',<?php echo $row['student_id'];?>,<?php echo $class_id;?>)" class="btn btn-gray btn-small">
                                            <i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                        </a>
                                        <a  data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?teacher/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>')" class="btn btn-red btn-small">
                                            <i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                        </a>
                                        
                                        
                                        
                                        <!--<a href="<?php echo base_url();?>index.php?teacher/student/<?php echo $class_id;?>/personal_profile/<?php echo $row['student_id'];?>"
                                             class="btn btn-gray">
                                                <i class="icon-wrench"></i> <?php echo get_phrase('personal_profile');?>
                                        </a>
                                        <a href="<?php echo base_url();?>index.php?teacher/student/<?php echo $class_id;?>/academic_result/<?php echo $row['student_id'];?>"
                                             class="btn btn-gray">
                                                <i class="icon-wrench"></i> <?php echo get_phrase('academic_result');?>
                                        </a>
                                        <a href="<?php echo base_url();?>index.php?teacher/student/<?php echo $class_id;?>/edit/<?php echo $row['student_id'];?>"
                                            class="btn btn-gray">
                                                <i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                        </a>
                                        <a href="<?php echo base_url();?>index.php?teacher/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>" onclick="return confirm('delete?')"
                                             class="btn btn-red">
                                                <i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                        </a>-->
                                        
                                        
                                        
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
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open('teacher/student/create/' , array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="birthday"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male"><?php echo get_phrase('male');?></option>
                                    	<option value="female"><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('religion');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="religion"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('blood_group');?></label>
                                <div class="controls">
                                    <select name="blood_group" class="uniform" style="width:100%;">
                                    	<option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('father_name');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="father_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('mother_name');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="mother_name"/>
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
                                    		<option value="<?php echo $row['class_id'];?>">
												<?php echo $row['name'];?>
                                                    </option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('roll');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="roll"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('photo');?></label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="userfile" id="imgInp" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="<?php echo base_url();?>uploads/user.jpg" alt="your image" height="100" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_student');?></button>
                        </div>
                    <?php echo form_close();?>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
<?php endif;?>
<?php if($class_id == ""):?>
<center>
<div class="span5" style="float:none !important;">
    <div class="box">
		<div class="box-header">
			<span class="title"> <i class="icon-info-sign"></i> Please select a class to manage student.</span>
		</div>
		<div class="box-content padded">
            <br />
            <select name="class_id" onchange="window.location='<?php echo base_url();?>index.php?teacher/student/'+this.value">
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
                        Growl.info({title:"Select a class to manage student",text:" "});
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