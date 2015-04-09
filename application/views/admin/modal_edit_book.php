<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/book/do_update/'.$row['book_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('name');?></label>
                    <div class="controls">
                        <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('author');?></label>
                    <div class="controls">
                        <input type="text" class="" name="author" value="<?php echo $row['author'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('description');?></label>
                    <div class="controls">
                        <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('price');?></label>
                    <div class="controls">
                        <input type="text" class="" name="price" value="<?php echo $row['price'];?>"/>
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
                                    <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>><?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('status');?></label>
                    <div class="controls">
                        <select name="status" class="uniform" style="width:100%;">
                            <option value="available" <?php if($row['status']=='available')echo 'selected';?>><?php echo get_phrase('available');?></option>
                            <option value="unavailable" <?php if($row['status']=='unavailable')echo 'selected';?>><?php echo get_phrase('unavailable');?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_book');?></button>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>