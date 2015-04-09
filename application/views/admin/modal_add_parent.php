<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php echo form_open('admin/parent/create/'.$student_id.'/'.$class_id , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
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
                        <input type="text" class="validate[required]" name="name" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('email');?></label>
                    <div class="controls">
                        <input type="text" class="" name="email" value=""/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('password');?></label>
                    <div class="controls">
                        <input type="text" class="" name="password" value=""/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('relation_with_student');?></label>
                    <div class="controls">
                        <input type="text" class="" name="relation_with_student" value=""/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('phone');?></label>
                    <div class="controls">
                        <input type="text" class="" name="phone" value=""/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('address');?></label>
                    <div class="controls">
                        <input type="text" class="" name="address" value=""/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('profession');?></label>
                    <div class="controls">
                        <input type="text" class="" name="profession" value=""/>
                    </div>
                </div>
                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_parent');?></button>
            </div>
        </form>
    </div>
</div>
