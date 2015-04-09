<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
    <head>
        <title>School Management System PRO | web installer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="<?php echo base_url();?>template/install/install.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="<?php echo base_url();?>template/install/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>template/install/sliding.form.js"></script>
    </head>
    <style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
        h1 a{
            color:#ccc;
            font-size:26px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
			text-decoration:none;
        }
    </style>
    <body>
    	<center><br>
        	<h1>
            	School Management System PRO
            </h1>
            
            
        </center>
        <div id="content">
        
        	<?php if( $this->session->flashdata('installation_result') == 'failed'):?>
            	<div class="result_error">Installation failed due to invalid settings</div>
            <?php endif;?>
            
        	<?php if( ($this->session->flashdata('flash_message'))  != "" ):?>
            	<div class="result_error"> <?php echo $this->session->flashdata('flash_message');?> </div>
            <?php endif;?>
            
            <div id="wrapper">
                <div id="steps">
                    <?php echo form_open('install/do_install' , array('id' => 'formElem' , 'name' => 'formElem'));?>
                        <fieldset class="step">
                            <legend>Welcome to web installer</legend>
                            <br><br><br><br><br><br>
                            <p>
                                Install the script in few clicks.
                                <br>
                                Provide database and admin settings,
                                <br>
                                and run the installer. It's easy !
                                
                                
                            </p>
                                <ol style="clear:both;margin-top:100px;margin-left:50px; text-align:left;">
                                	<li><span style="color:#900;font-weight:bold;">Required</span> - 
                                    	application/config/database.php to be <span style="color:#063;font-weight:bold;">writtable</span>
                                        
                                        <?php
											// Checking whether db config file is writtable
                                        	if (is_writable('./application/config/database.php')):?>
                                            	<img src="<?php echo base_url();?>template/images/tick.png" title="writtable" style="vertical-align:middle;"/>
                                        <?php
											else:?>
                                            	<img src="<?php echo base_url();?>template/images/cross.png" title="not writtable" style="vertical-align:middle;"/>
                                        <?php endif;?>
                                    </li>
                                    
                                	<li><span style="color:#900;font-weight:bold;">Required</span> - 
                                    	application/config/routes.php to be <span style="color:#063;font-weight:bold;">writtable</span>
                                        
                                        
                                        <?php
											// Checking whether routing config file is writtable
                                        	if (is_writable('./application/config/routes.php')):?>
                                            	<img src="<?php echo base_url();?>template/images/tick.png" title="writtable" style="vertical-align:middle;"/>
                                        <?php
											else:?>
                                            	<img src="<?php echo base_url();?>template/images/cross.png" title="not writtable" style="vertical-align:middle;"/>
                                        <?php endif;?>
                                    </li>
                                    
                                    <li><span style="color:#900;font-weight:bold;">Required</span> - 
                                    	php CURL function <span style="color:#063;font-weight:bold;">enabled </span>
                                        
                                        <?php
											// Checking whether CURL installed or not
                                        	if (in_array  ('curl', get_loaded_extensions())):?>
                                            	<img src="<?php echo base_url();?>template/images/tick.png" title="curl found" style="vertical-align:middle;"/>
                                        <?php
											else:?>
                                            	<img src="<?php echo base_url();?>template/images/cross.png" title="curl not found" style="vertical-align:middle;"/>
                                        <?php endif;?>
                                    </li>
                                </ol>
                        </fieldset>
                        
                        <fieldset class="step">
                            <legend>Database settings</legend>
                            <p>
                                <label for="name">Database Name</label>
                                <input id="db_name" name="db_name" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="country">User name</label>
                                <input id="db_uname" name="db_uname" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="phone">Password</label>
                                <input id="db_password" name="db_password" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="website">Host Name</label>
                                <input id="db_hname" name="db_hname" type="text" AUTOCOMPLETE=OFF value="localhost" />
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Settings</legend>
                            <p>
                                <label for="namecard">School name</label>
                                <textarea  name="system_name" AUTOCOMPLETE=OFF></textarea>
                            </p>
                            <p>
                                <label for="cardnumber">Admin email</label>
                                <input id="email" name="email" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="secure">Login password</label>
                                <input id="password" name="password" type="password" AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
						<fieldset class="step">
                            <legend>Confirm</legend>
							<p>
								Everything in the form was correctly filled 
								if all the steps have a green checkmark icon.
								A red checkmark icon indicates that some field 
								is missing or filled out with invalid data.
							</p>
                            <p class="submit">
                                <button id="registerButton" type="submit">Run installer</button>
                            </p>
                        </fieldset>
                    <?php echo form_close();?>
                </div>
                <div id="navigation" style="display:none;">
                    <ul>
                        <li class="selected">
                            <a href="#">Welcome</a>
                        
                        </li>
                        <li>
                            <a href="#">Database</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
						<li>
                            <a href="#">Install</a>
                        </li>
                    </ul>
                </div>
                <!--steps finishes here-->
            </div>
         </a>
            
        </div>
    </body>
</html>