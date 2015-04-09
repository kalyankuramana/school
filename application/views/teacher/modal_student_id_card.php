<?php
$student_info	=	$this->crud_model->get_student_info($current_student_id);
foreach($student_info as $row):?>

	<div style="background-color: #2A3542;text-align: left;color: #fff;font-size: 21px;font-weight: 100;padding-left:20px;margin-top:60px;">
    	<img src="<?php echo base_url();?>uploads/logo.png"  
        	style="max-height:60px; max-width:100px; vertical-align:text-bottom;"/>
				<?php echo $system_name;?>
    </div>
<style>
.idcard_text
{
	padding: 6px;
	font-weight: 100;
	font-size: 13px;
}
</style>
	<table width="100%" border="0" style="background-color:#fff; font-size:13px;">
      <tr>
        <td rowspan="6" width="170" valign="top">
        	<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" 
                 style="max-height:130px;max-width:130px;border-radius: 10%;margin:20px;" />
        </td>
        <td class="idcard_text" width="100" style="padding-top:16px;"><?php echo get_phrase('name');?></td>
        <td class="idcard_text" style="padding-top:16px;"><?php echo $row['name'];?></td>
      </tr>
      <tr>
        <td class="idcard_text"><?php echo get_phrase('class');?></td>
        <td class="idcard_text"><?php echo $this->crud_model->get_class_name($row['class_id']);?></td>
      </tr>
      <tr>
        <td class="idcard_text"><?php echo get_phrase('roll');?></td>
        <td class="idcard_text"><?php echo $row['roll'];?></td>
      </tr>
      <tr>
        <td class="idcard_text"><?php echo get_phrase('birthday');?></td>
        <td class="idcard_text"><?php echo $row['birthday'];?></td>
      </tr>
      <tr>
        <td class="idcard_text"><?php echo get_phrase('sex');?></td>
        <td class="idcard_text"><?php echo $row['sex'];?></td>
      </tr>
      <tr>
        <td class="idcard_text"><?php echo get_phrase('blood_group');?></td>
        <td class="idcard_text"><?php echo $row['blood_group'];?></td>
      </tr>
      <tr>
        <td colspan="3" style="background-color:#D9E6E9;font-size:10px; text-align:right;padding:8px;">&copy; 2013</td>
      </tr>
    </table>

<?php endforeach;?>