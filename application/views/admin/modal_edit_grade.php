<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/grade/do_update/'.$row['grade_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('name');?></label>
                    <div class="controls">
                        <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('grade_point');?></label>
                    <div class="controls">
                        <input type="text" class="" name="grade_point" value="<?php echo $row['grade_point'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('mark_from');?></label>
                    <div class="controls">
                        <input type="text" class="" name="mark_from" value="<?php echo $row['mark_from'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('mark_upto');?></label>
                    <div class="controls">
                        <input type="text" class="" name="mark_upto" value="<?php echo $row['mark_upto'];?>"/>
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
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_grade');?></button>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>