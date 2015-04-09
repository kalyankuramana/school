	<div class="container-fluid padded">
		<div class="row-fluid">
			<div class="span30">
				<!-- find me in partials/action_nav_normal -->
				<!--big normal buttons-->
				<div class="action-nav-normal">
					<div class="row-fluid">
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/student">
                            <img src="<?php echo base_url();?>template/images/icons/user.png" />
							<span><?php echo get_phrase('manage_student');?></span>
                            <span class="label label-blue"><?php echo $this->db->count_all_results('student');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/teacher">
							<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
							<span><?php echo get_phrase('manage_teacher');?></span>
                            <span class="label label-blue"><?php echo $this->db->count_all_results('teacher');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/marks">
							<img src="<?php echo base_url();?>template/images/icons/marks.png" />
							<span><?php echo get_phrase('marks-attendance');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/class_routine">
							<img src="<?php echo base_url();?>template/images/icons/routine.png" />
							<span><?php echo get_phrase('class_routine');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/invoice">
							<img src="<?php echo base_url();?>template/images/icons/payment.png" />
							<span><?php echo get_phrase('payment');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/book">
							<img src="<?php echo base_url();?>template/images/icons/book.png" />
							<span><?php echo get_phrase('library');?></span>
							</a>
						</div>
                    </div>
                    <div class="row-fluid">
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/dormitory">
							<img src="<?php echo base_url();?>template/images/icons/dormitory.png" />
							<span><?php echo get_phrase('dormitory');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/transport">
							<img src="<?php echo base_url();?>template/images/icons/transport.png" />
							<span><?php echo get_phrase('transport');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/noticeboard">
							<img src="<?php echo base_url();?>template/images/icons/noticeboard.png" />
							<span><?php echo get_phrase('noticeboard');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/system_settings">
							<img src="<?php echo base_url();?>template/images/icons/settings.png" />
							<span><?php echo get_phrase('settings');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/manage_language">
							<img src="<?php echo base_url();?>template/images/icons/language.png" />
							<span><?php echo get_phrase('language');?></span>
							</a>
						</div>
						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/backup_restore">
							<img src="<?php echo base_url();?>template/images/icons/backup.png" />
							<span><?php echo get_phrase('backup');?></span>
							</a>
						</div>
						
					</div>
				</div>
			</div>
            <!---DASHBOARD MENU BAR ENDS HERE-->
       </div>
       
		<div class="row-fluid">
            <div class="span6">
				<div class="box">
					<div class="box-header">
						<div class="title">
                        	<i class="icon-calendar"></i>
							<?php echo get_phrase('calendar_schedule');?>
						</div>
					</div>
					<div class="box-content">
						<div id="calendar2">
						</div>
					</div>
				</div>
			</div>
            <!---CALENDAR ENDS-->
            
            <!---TO DO LIST STARTS-->
			<div class="span6">
				<div class="box">
					<div class="box-header">
						<span class="title">
                        	<i class="icon-reorder"></i>
                            <?php echo get_phrase('noticeboard');?>
                        </span>
					</div>
					<div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
                    
                    	<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						<div class="box-section news with-icons">
							<div class="avatar blue">
								<i class="icon-tag icon-2x"></i>
							</div>
							<div class="news-time">
								<span><?php echo date('d',$row['create_timestamp']);?></span> <?php echo date('M',$row['create_timestamp']);?>
							</div>
							<div class="news-content">
								<div class="news-title">
									<?php echo $row['notice_title'];?>
								</div>
								<div class="news-text">
									 <?php echo $row['notice'];?>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
            <!---TO DO LIST ENDS-->
       </div>
   </div>
   
  
  <script>
  $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $("#calendar2").fullCalendar({
            header: {
                left: "prev,next",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            editable: 0,
            droppable: 0,
            /*drop: function (e, t) {
                var n, r;
                r = $(this).data("eventObject"), n = $.extend({}, r), n.start = e, n.allDay = t, $("#calendar").fullCalendar("renderEvent", n, !0);
                if ($("#drop-remove").is(":checked")) return $(this).remove()
            },
			
			nulled by Vokey*/
            events: [
			<?php 
			$notices	=	$this->db->get('noticeboard')->result_array();
			foreach($notices as $row):
			?>
			{
                title: "<?php echo $row['notice_title'];?>",
                start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
				end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>) 
            },
			<?php 
			endforeach
			?>
			]
        })

});
  </script>