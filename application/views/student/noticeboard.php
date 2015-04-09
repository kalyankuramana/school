<div class="box">
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('noticeboard_list');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('notice');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($notices as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['notice_title'];?></td>
							<td><?php echo $row['notice'];?></td>
							<td><?php echo date('d M,Y', $row['create_timestamp']);?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
		</div>
	</div>
</div>