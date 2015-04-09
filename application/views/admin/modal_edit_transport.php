<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open('admin/transport/do_update/'.$row['transport_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('route_name');?></label>
                    <div class="controls">
                        <input type="text" class="validate[required]" name="route_name" value="<?php echo $row['route_name'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('number_of_vehicle');?></label>
                    <div class="controls">
                        <input type="text" class="" name="number_of_vehicle" value="<?php echo $row['number_of_vehicle'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('description');?></label>
                    <div class="controls">
                        <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('route_fare');?></label>
                    <div class="controls">
                        <input type="text" class="" name="route_fare" value="<?php echo $row['route_fare'];?>"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_transport');?></button>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>