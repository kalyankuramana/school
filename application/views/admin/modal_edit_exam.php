<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/exam/do_update/'.$row['exam_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('name');?></label>
                    <div class="controls">
                        <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('date');?></label>
                    <div class="controls">
                        <input type="text" class="datepicker fill-up" name="date" value="<?php echo $row['date'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('comment');?></label>
                    <div class="controls">
                        <input type="text" class="" name="comment" value="<?php echo $row['comment'];?>"/>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_exam');?></button>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>