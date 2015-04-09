<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
    	<?php 
		foreach($edit_data as $row):
			$student_id		=	$row['student_id'];
		
		?>
        
        
        <?php echo form_open('admin/parent/do_update/'.$row['parent_id'].'/'.$class_id , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('parent_of');?></label>
                    <div class="controls">
                        <input type="text"  readonly
                            value="<?php echo $this->db->get_where('student', array('student_id'=>$student_id))->row()->name;?>"/>
                    </div>
                </div>
                <hr />
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('name');?></label>
                    <div class="controls">
                        <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('email');?></label>
                    <div class="controls">
                        <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('password');?></label>
                    <div class="controls">
                        <input type="text" class="" name="password" value="<?php echo $row['password'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('relation_with_student');?></label>
                    <div class="controls">
                        <input type="text" class="" name="relation_with_student" value="<?php echo $row['relation_with_student'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('phone');?></label>
                    <div class="controls">
                        <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('address');?></label>
                    <div class="controls">
                        <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('profession');?></label>
                    <div class="controls">
                        <input type="text" class="" name="profession" value="<?php echo $row['profession'];?>"/>
                    </div>
                </div>
                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_parent');?></button>
            </div>
        </form>
        <?php endforeach;?>
    </div>
 </div>
					
