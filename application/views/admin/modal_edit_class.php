<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/classes/do_update/'.$row['class_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
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