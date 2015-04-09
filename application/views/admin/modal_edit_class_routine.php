<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/class_routine/do_update/'.$row['class_routine_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('class');?></label>
                    <div class="controls">
                        <select name="class_id" class="uniform" style="width:100%;">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>" <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('subject');?></label>
                    <div class="controls">
                        <select name="subject_id" class="uniform" style="width:100%;">
                            <?php 
                            $subjects = $this->db->get('subject')->result_array();
                            foreach($subjects as $row2):
                            ?>
                                <option value="<?php echo $row2['subject_id'];?>" <?php if($row['subject_id']==$row2['subject_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('day');?></label>
                    <div class="controls">
                        <select name="day" class="uniform" style="width:100%;">
                            <option value="saturday" 	<?php if($row['day']=='saturday')echo 'selected="selected"';?>>saturday</option>
                            <option value="sunday" 		<?php if($row['day']=='sunday')echo 'selected="selected"';?>>sunday</option>
                            <option value="monday" 		<?php if($row['day']=='monday')echo 'selected="selected"';?>>monday</option>
                            <option value="tuesday" 	<?php if($row['day']=='tuesday')echo 'selected="selected"';?>>tuesday</option>
                            <option value="wednesday" 	<?php if($row['day']=='wednesday')echo 'selected="selected"';?>>wednesday</option>
                            <option value="thursday" 	<?php if($row['day']=='thursday')echo 'selected="selected"';?>>thursday</option>
                            <option value="friday" 		<?php if($row['day']=='friday')echo 'selected="selected"';?>>friday</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('starting_time');?></label>
                    <div class="controls">
                        <?php 
                            if($row['time_start'] < 13)
                            {
                                $time_start		=	$row['time_start'];
                                $starting_ampm	=	1;
                            }
                            else if($row['time_start'] > 12)
                            {
                                $time_start		=	$row['time_start'] - 12;
                                $starting_ampm	=	2;
                            }
                            
                        ?>
                        <select name="time_start" class="uniform" style="width:100%;">
                            <?php for($i = 0; $i <= 12 ; $i++):?>
                                <option value="<?php echo $i;?>" <?php if($i ==$time_start)echo 'selected="selected"';?>>
                                    <?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        <select name="starting_ampm" class="uniform" style="width:100%">
                            <option value="1" <?php if($starting_ampm	==	'1')echo 'selected="selected"';?>>am</option>
                            <option value="2" <?php if($starting_ampm	==	'2')echo 'selected="selected"';?>>pm</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('ending_time');?></label>
                    <div class="controls">
                        
                        
                        <?php 
                            if($row['time_end'] < 13)
                            {
                                $time_end		=	$row['time_end'];
                                $ending_ampm	=	1;
                            }
                            else if($row['time_end'] > 12)
                            {
                                $time_end		=	$row['time_end'] - 12;
                                $ending_ampm	=	2;
                            }
                            
                        ?>
                        <select name="time_end" class="uniform" style="width:100%;">
                            <?php for($i = 0; $i <= 12 ; $i++):?>
                                <option value="<?php echo $i;?>" <?php if($i ==$time_end)echo 'selected="selected"';?>>
                                    <?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        <select name="ending_ampm" class="uniform" style="width:100%">
                            <option value="1" <?php if($ending_ampm	==	'1')echo 'selected="selected"';?>>am</option>
                            <option value="2" <?php if($ending_ampm	==	'2')echo 'selected="selected"';?>>pm</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_class_routine');?></button>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>