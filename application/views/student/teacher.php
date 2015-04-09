<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('teacher_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
            		<div class="action-nav-normal">
                        <div class=" action-nav-button" style="width:300px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span>Total <?php echo count($teachers);?> teachers</span>
                          </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-content">
                            <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                        <th><div>ID</div></th>
                                        <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                                        <th><div><?php echo get_phrase('teacher_name');?></div></th>
                                        <th><div><?php echo get_phrase('email');?></div></th>
                                        <th><div><?php echo get_phrase('options');?></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;foreach($teachers as $row):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><div class="avatar"><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" class="avatar-medium" /></div></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td align="center">
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('teacher_profile',<?php echo $row['teacher_id'];?>)"
                                                 class="btn btn-default btn-small">
                                                    <i class="icon-user"></i> <?php echo get_phrase('profile');?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
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