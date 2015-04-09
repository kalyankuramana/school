<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/invoice/do_update/'.$row['invoice_id'], array('class' => 'form-horizontal validatable','target'=>'_top'));?>
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
                            value="<?php echo date('m/d/Y', $row['creation_timestamp']);?>"/>
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