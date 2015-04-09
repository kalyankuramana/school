<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
        	<?php if(isset($personal_profile)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('personal_profile');?>
                    	</a></li>
            <?php endif;?>
        	<?php if(isset($academic_result)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('academic_result');?>
                    	</a></li>
            <?php endif;?>
        	<?php if(isset($edit_data)):?>
			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo get_phrase('edit_student');?>
                    	</a></li>
            <?php endif;?>
			<li class="<?php if(!isset($edit_data) && !isset($personal_profile) && !isset($academic_result) )echo 'active';?>">
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
	<div class="box-content padded">
		<div class="tab-content">
        	<!----PERSONAL PROFILE STARTS---->
        	<?php if(isset($personal_profile)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php
					$student_info	=	$this->crud_model->get_student_info($current_student_id);
					foreach($student_info as $row):?>
									<center>
									<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" />
									<table class="table table-striped " style="width:500px;">
				
										<?php if($row['name'] != ''):?>
										<tr>
											<td width="150">Name</td>
											<td><b><?php echo $row['name'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['class_id'] != ''):?>
										<tr>
											<td>Class</td>
											<td><b><?php echo $this->crud_model->get_class_name($row['class_id']);?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['roll'] != ''):?>
										<tr>
											<td>Roll</td>
											<td><b><?php echo $row['roll'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['birthday'] != ''):?>
										<tr>
											<td>Birthday</td>
											<td><b><?php echo $row['birthday'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['sex'] != ''):?>
										<tr>
											<td>Sex</td>
											<td><b><?php echo $row['sex'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['blood_group'] != ''):?>
										<tr>
											<td>Blood group</td>
											<td><b><?php echo $row['blood_group'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['religion'] != ''):?>
										<tr>
											<td>Relegion</td>
											<td><b><?php echo $row['religion'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['address'] != ''):?>
										<tr>
											<td>Address</td>
											<td><b><?php echo $row['address'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['phone'] != ''):?>
										<tr>
											<td>Phone</td>
											<td><b><?php echo $row['phone'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['email'] != ''):?>
										<tr>
											<td>Email</td>
											<td><b><?php echo $row['email'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['father_name'] != ''):?>
										<tr>
											<td>Father name</td>
											<td><b><?php echo $row['father_name'];?></b></td>
										</tr>
										<?php endif;?>
									
										<?php if($row['mother_name'] != ''):?>
										<tr>
											<td>Mother name</td>
											<td><b><?php echo $row['mother_name'];?></b></td>
										</tr>
										<?php endif;?>
										
									</table>
									</center>
					
					<?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----PERSONAL PROFILE ENDS--->
            <!----ACADEMIC RESULT STARTS---->
        	<?php if(isset($academic_result)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php
						$student_info	=	$this->crud_model->get_student_info($current_student_id);
						foreach($student_info as $row1):
					?>
                	<center>
                    <img src="<?php echo $this->crud_model->get_image_url('student' , $row1['student_id']);?>" class="image_thumbnail_large" style="max-height:200px; max-width:200px;" />
                    <div style="font-size:25px;"><?php echo $row1['name'];?></div>
                    
                    <div class="accordion" id="accordion2">
                    
                    	<?php 
						/////SEMESTER WISE RESULT, RESULTSHEET FOR EACH SEMESTER SEPERATELY
						$exams	=	$this->crud_model->get_exams();
						foreach($exams as $row0):
												
						$total_grade_point	=	0;
						$total_marks		=	0;
						$total_subjects		=	0;
						?>
                        <div class="accordion-group">
                          <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row0['exam_id'];?>">
                              <?php echo $row0['name'];?>
                            </a>
                          </div>
                          <div id="collapse<?php echo $row0['exam_id'];?>" class="accordion-body collapse" style="height: 0px;">
                            <div class="accordion-inner">
                            <center>
                              <table class="table table-striped " >
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Obtained marks</th>
                                            <th>Highest mark</th>
                                            <th>Grade</th>
                                            <th>Attendance</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $subjects	=	$this->crud_model->get_subjects_by_class($row1['class_id']);
                                        foreach($subjects as $row2):
										$total_subjects++;
										?>
                                        <tr>
                                            <td><?php echo $row2['name'];?></td>
                                            <td>
                                                <?php
                                                //obtained marks
                                                $verify_data	=	array(	'exam_id' => $row0['exam_id'] ,
                                                                    'class_id' => $row1['class_id'] ,
                                                                    'subject_id' => $row2['subject_id'] , 
                                                                    'student_id' => $row1['student_id']);
                                                                    
                                                $query = $this->db->get_where('mark' , $verify_data);							 
                                                $marks	=	$query->result_array();
                                                foreach($marks as $row3):
													echo $row3['mark_obtained'];
													$total_marks	+=	$row3['mark_obtained'];
												endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                //highest marks
                                                $verify_data	=	array(	'exam_id' => $row0['exam_id'] ,
                                                                    'subject_id' => $row2['subject_id']);
                                                $this->db->select_max('mark_obtained' , 'mark_highest');
                                                $query = $this->db->get_where('mark' , $verify_data);							 
                                                $marks	=	$query->result_array();
                                                foreach($marks as $row4):echo $row4['mark_highest'];endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
												$grade	=	$this->crud_model->get_grade($row3['mark_obtained']);
												echo $grade['name'];
												$total_grade_point	+=	$grade['grade_point'];
												?>
                                            </td>
                                            <td>
                                                <?php echo $row3['attendance'];?>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <hr />
                                Total Marks : <?php	echo $total_marks;?>
                                <hr />
                                GPA(grade point average) : <?php echo round($total_grade_point/$total_subjects , 2);?>
                                </center>
                            </div>
                          </div>
                        </div>
                        <?php endforeach;?>
                      </div>
                    </center>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----ACADEMIC RESULT ENDS--->
            <!----EDITING FORM STARTS---->
        	<?php if(isset($edit_data)):?>
			<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <form method="post" action="<?php echo base_url();?>index.php?parents/student/<?php echo $class_id;?>/do_update/<?php echo $row['student_id'];?>" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('name');?></label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="controls">
                                    <input type="text" class="datepicker fill-up" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('sex');?></label>
                                <div class="controls">
                                    <select name="sex" class="uniform" style="width:100%;">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('religion');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="religion" value="<?php echo $row['religion'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('blood_group');?></label>
                                <div class="controls">
                                    <select name="blood_group" class="uniform" style="width:100%;">
                                    	<option value="A+" <?php if($row['blood_group']=='A+')echo 'selected';?>>A+</option>
                                        <option value="A-" <?php if($row['blood_group']=='A-')echo 'selected';?>>A-</option>
                                        <option value="B+" <?php if($row['blood_group']=='B+')echo 'selected';?>>B+</option>
                                        <option value="B-" <?php if($row['blood_group']=='B-')echo 'selected';?>>B-</option>
                                        <option value="AB+" <?php if($row['blood_group']=='AB+')echo 'selected';?>>AB+</option>
                                        <option value="AB-" <?php if($row['blood_group']=='AB-')echo 'selected';?>>AB-</option>
                                        <option value="O+" <?php if($row['blood_group']=='O+')echo 'selected';?>>O+</option>
                                        <option value="O-" <?php if($row['blood_group']=='O-')echo 'selected';?>>O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('address');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('phone');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('email');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('father_name');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="father_name" value="<?php echo $row['father_name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('mother_name');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="mother_name" value="<?php echo $row['mother_name'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('class');?></label>
                                <div class="controls">
                                    <select name="class_id" class="uniform" style="width:100%;">
                                    	<?php 
										$classes = $this->db->get('class')->result_array();
										foreach($classes as $row2):
										?>
                                    		<option value="<?php echo $row2['class_id'];?>"
                                            	<?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
													<?php echo $row2['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('roll');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="roll" value="<?php echo $row['roll'];?>"/>
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
                                    <img id="blah" src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" alt="your image" height="100" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_student');?></button>
                        </div>
                    </form>
                    <?php endforeach;?>
                </div>
			</div>
            <?php endif;?>
            <!----EDITING FORM ENDS--->
            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  <?php if(!isset($edit_data) && !isset($personal_profile) && !isset($academic_result) )echo 'active';?>" id="list">
				<center>
                	<br />
                	<select name="class_id" class="uniform" style="width:100%;" onchange="window.location='<?php echo base_url();?>index.php?parents/student/'+this.value">
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
                    	<div class="row-fluid">
                            <div class="  alert alert-info span16 ">
                                Please select a class to manage student.
                            </div>
                        </div>
                    <?php endif;?>
                </center>
                <?php if($class_id	!=	''):?>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive box">
                	<thead>
                		<tr>
                    		<th><div>ID</div></th>
                    		<th width="80"><div><?php echo get_phrase('photo');?></div></th>
                    		<th><div><?php echo get_phrase('student_name');?></div></th>
                    		<th><div><?php echo get_phrase('roll');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($students as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="image_thumbnail" /></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['roll'];?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?parents/student/<?php echo $class_id;?>/personal_profile/<?php echo $row['student_id'];?>"
                                	 class="btn btn-gray">
                                		<i class="icon-wrench"></i> <?php echo get_phrase('personal_profile');?>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?parents/student/<?php echo $class_id;?>/academic_result/<?php echo $row['student_id'];?>"
                                	 class="btn btn-gray">
                                		<i class="icon-wrench"></i> <?php echo get_phrase('academic_result');?>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?parents/student/<?php echo $class_id;?>/edit/<?php echo $row['student_id'];?>"
                                	class="btn btn-gray">
                                		<i class="icon-wrench"></i> <?php echo get_phrase('edit');?>
                                </a>
                            	<a href="<?php echo base_url();?>index.php?parents/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>" onclick="return confirm('delete?')"
                                	 class="btn btn-red">
                                		<i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php endif;?>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <form method="post" action="<?php echo base_url();?>index.php?parents/student/create/" class="form-horizontal validatable" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-blue"><?php echo get_phrase('add_student');?></button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
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