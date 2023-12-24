<?php $role='accountant'; ?>



<script type="text/javascript">



	$(document).ready(function() {



		"use strict";



		$('#staff_form').validationEngine({promptPosition : "bottomLeft",maxErrorsPerField: 1});  



		$.datepicker.setDefaults($.datepicker.regional['<?php echo MJ_gmgt_get_current_lan_code(); ?>']);



		jQuery('#birth_date').datepicker({



			dateFormat: '<?php echo get_option('gmgt_datepicker_format');?>',



			maxDate : 0,



			changeMonth: true,



		    changeYear: true,



		    yearRange:'-65:+25',



			beforeShow: function (textbox, instance) 



			{



				instance.dpDiv.css({



					marginTop: (-textbox.offsetHeight) + 'px'                   



				});



			},    



		    onChangeMonthYear: function(year, month, inst) {



		        jQuery(this).val(month + "/" + year);



		    }                    



		});



	});



</script>



<?php 	



if($active_tab == 'add_accountant')



{



	$accountant_id=0;



	$edit=0;



	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')



	{	



		$accountant_id=esc_attr($_REQUEST['accountant_id']);



		$edit=1;

		$user_info = get_userdata($accountant_id);	



	}



	?>



	<div class="panel-body padding_0"><!-- PANLE BODY DIV START-->



		<form name="staff_form" action="" method="post" class="form-horizontal" id="staff_form"><!-- Accountant FORM START-->



			<?php $action = isset($_REQUEST['action'])?$_REQUEST['action']:'insert';?>



			<input type="hidden" name="action" value="<?php echo esc_attr($action);?>">



			<input type="hidden" name="role" value="<?php echo esc_attr($role);?>"  />



			<input type="hidden" name="user_id" value="<?php echo esc_attr($accountant_id);?>"  />



			<div class="header">	



				<h3 class="first_hed"><?php esc_html_e('Personal Information','gym_mgt');?></h3>



			</div>



			<div class="form-body user_form"> <!-- user_form Strat-->   



				<div class="row"><!--Row Div Strat--> 







					



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="first_name" class="form-control validate[required,custom[onlyLetter_specialcharacter]] text-input" maxlength="50" type="text" value="<?php if($edit){ echo esc_attr($user_info->first_name);}elseif(isset($_POST['first_name'])) echo esc_attr($_POST['first_name']);?>" name="first_name" >



								<label class="" for="first_name"><?php esc_html_e('First Name','gym_mgt');?><span class="require-field">*</span>



								</label>



							</div>



						</div>



					</div>



					<!--nonce--->



					<?php wp_nonce_field('save_staff_nonce'); ?>



					<!--nonce--->



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="middle_name" class="form-control validate[custom[onlyLetter_specialcharacter]] " type="text" maxlength="50"  value="<?php if($edit){ echo esc_attr($user_info->middle_name);}elseif(isset($_POST['middle_name'])) echo esc_attr($_POST['middle_name']);?>" name="middle_name" >



								<label class="" for="middle_name"><?php esc_html_e('Member Type','gym_mgt');?>



								</label>



							</div>



						</div>



					</div>







					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="last_name" class="form-control validate[required,custom[onlyLetter_specialcharacter]] text-input" maxlength="50" type="text"  value="<?php if($edit){ echo esc_attr($user_info->last_name);}elseif(isset($_POST['last_name'])) echo esc_attr($_POST['last_name']);?>" name="last_name" >



								<label class="" for="last_name"><?php esc_html_e('Last Name','gym_mgt');?><span class="require-field">*</span>



								</label>



							</div>



						</div>



					</div>







					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="birth_date" class="form-control validate[required] date_picker"  type="text"  name="birth_date" 



								value="<?php if($edit){ echo MJ_gmgt_getdate_in_input_box($user_info->birth_date);}elseif(isset($_POST['birth_date'])){ echo esc_attr($_POST['birth_date']);}else{ echo MJ_gmgt_getdate_in_input_box(date("Y-m-d")); }?>" readonly >



								<label class="date_of_birth_label date_label" for="birth_date"><?php esc_html_e('Date of Birth','gym_mgt');?><span class="require-field">*</span>



								</label>



							</div>



						</div>



					</div>	







					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 res_margin_bottom_20px rtl_margin_top_15px">



						<div class="form-group">



							<div class="col-md-12 form-control">



								<div class="row padding_radio">



									<div class="input-group">



										<label class="custom-top-label" for="gender"><?php esc_html_e('Gender','gym_mgt');?><span class="require-field">*</span>



										</label>



										<div class="col-sm-7 marign_left_20_res">



											<?php $genderval = "male"; if($edit){ $genderval=$user_info->gender; }elseif(isset($_POST['gender'])) {$genderval=esc_attr($_POST['gender']);}?>



											<label class="radio-inline custom_radio margin_right_5px">



												<input type="radio" value="male" class="tog" name="gender"  <?php  checked( 'male', esc_html($genderval));  ?>  /><?php esc_html_e('Male','gym_mgt');?>



											</label>



											<label class="radio-inline custom_radio">



												<input type="radio" value="female" class="tog" name="gender"  <?php  checked( 'female', esc_html($genderval));  ?>/><?php esc_html_e('Female','gym_mgt');?>



											</label>



										</div>



									</div>



								</div>



							</div>					



						</div>



					</div>



				</div><!--Row Div End--> 



			</div><!-- user_form End-->  







			<div class="header">	



				<h3 class="first_hed"><?php esc_html_e('Login Information','gym_mgt');?></h3>



			</div>



			<div class="form-body user_form"> <!-- user_form Strat-->   



				<div class="row"><!--Row Div Strat--> 



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input type="hidden"  name="hidden_email" value="<?php if($edit){ echo esc_attr($user_info->user_email); } ?>">



								<input id="email" class="form-control validate[required,custom[email]] text-input" maxlength="100" type="text" name="email" value="<?php if($edit){ echo esc_attr($user_info->user_email);}elseif(isset($_POST['email'])) echo esc_attr($_POST['email']);?>" >



								<label class="" for="email"><?php esc_html_e('Email','gym_mgt');?><span class="require-field">*</span>



								</label>



							</div>



						</div>



					</div>



					



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="password" class="form-control space_validation <?php if(!$edit) echo esc_attr('validate[required]');?>" type="password" minlength="8" maxlength="12" name="password" value="" >



								<label class="" for="password"><?php esc_html_e('Password','gym_mgt');?><?php if(!$edit) {?><span class="require-field">*</span><?php }?></label>



							</div>



						</div>



					</div>



					<div class="col-md-6">



						<div class="row">



							<div class="col-md-4">



								<div class="form-group input margin_bottom_0">



									<div class="col-md-12 form-control">



										<input type="text" readonly value="+<?php echo MJ_gmgt_get_countery_phonecode(get_option('gmgt_contry'));?>"  class="form-control" name="phonecode">



										<label for="phonecode" class="pl-2"><?php esc_html_e('Country Code','gym_mgt');?><span class="required red">*</span></label>



									</div>											



								</div>



							</div>



							<div class="col-md-8">



								<div class="form-group input margin_bottom_0">



									<div class="col-md-12 form-control">



										<input id="mobile" class="form-control validate[required,custom[phone_number]] text-input phone_validation" type="text" name="mobile" minlength="6" maxlength="15" value="<?php if($edit){ echo esc_attr($user_info->mobile);}elseif(isset($_POST['mobile'])) echo esc_attr($_POST['mobile']);?>" >



										<label class="" for="mobile"><?php esc_html_e('Mobile Number','gym_mgt');?><span class="require-field">*</span>



										</label>



									</div>



								</div>



							</div>



						</div>



					</div>



				</div><!--Row Div End--> 



			</div><!-- user_form End--> 







			<div class="header">	



				<h3 class="first_hed"><?php esc_html_e('Contact Information','gym_mgt');?></h3>



			</div>



			<div class="form-body user_form"> <!-- user_form Strat-->   



				<div class="row"><!--Row Div Strat--> 	



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="address" class="form-control " maxlength="150" type="text"  name="address" value="<?php if($edit){ echo esc_attr($user_info->address);}elseif(isset($_POST['address'])) echo esc_attr($_POST['address']);?>" >



								<label class="" for="address"><?php esc_html_e('Address','gym_mgt');?>



								</label>



							</div>



						</div>



					</div>



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="city_name" class="form-control " maxlength="50" type="text"  name="city_name" 



								value="<?php if($edit){ echo esc_attr($user_info->city_name);}elseif(isset($_POST['city_name'])) echo esc_attr($_POST['city_name']);?>" >



								<label class="" for="city_name"><?php esc_html_e('City','gym_mgt');?></label>



							</div>



						</div>



					</div>



					



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">



						<div class="form-group input">



							<div class="col-md-12 form-control">



								<input id="phone" class="form-control validate[custom[phone_number]] text-input phone_validation" type="text" minlength="6" maxlength="15"   name="phone" value="<?php if($edit){ echo esc_attr($user_info->phone);}elseif(isset($_POST['phone'])) echo esc_attr($_POST['phone']);?>" >



								<label class="" for="phone"><?php esc_html_e('Phone','gym_mgt');?></label>



							</div>



						</div>



					</div>	



				</div><!--Row Div End--> 



			</div><!-- user_form End--> 







			<div class="header">	



				<h3 class="first_hed"><?php esc_html_e('Profile Image','gym_mgt');?></h3>



			</div>



			<div class="form-body user_form"> <!-- user_form Strat-->   



				<div class="row"><!--Row Div Strat--> 



					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">



						<div class="form-group input">



							<div class="col-md-12 form-control upload-profile-image-patient">



								<label class="ustom-control-label custom-top-label ml-2" for="photo"><?php esc_html_e('Image','gym_mgt');?></label>



								<div class="col-sm-12 display_flex">



									<input type="text" id="gmgt_user_avatar_url" class="form-control" name="gmgt_user_avatar" readonly value="<?php if($edit)echo esc_url( $user_info->gmgt_user_avatar );elseif(isset($_POST['gmgt_user_avatar'])) echo esc_url($_POST['gmgt_user_avatar']); ?>" />



									<input id="upload_user_avatar_button" type="button" class="button upload_image_btn" style="float: right;" value="<?php esc_html_e( 'Upload image', 'gym_mgt' ); ?>" />								



								</div>



							</div>



							<div class="clearfix"></div>



							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">



								<div id="upload_user_avatar_preview" >



									<?php 



									if($edit) 



									{



										if($user_info->gmgt_user_avatar == "")



										{ ?>



											<img class="image_preview_css" src="<?php echo esc_url(get_option( 'gmgt_Account_logo' )); ?>">



											<?php 



										}



										else 



										{



											?>



											<img class="image_preview_css" src="<?php if($edit)echo esc_url( $user_info->gmgt_user_avatar ); ?>" />



											<?php 



										}



									}



									else 



									{



										?>



										<img class="image_preview_css" src="<?php echo esc_url(get_option( 'gmgt_Account_logo' )); ?>">



										<?php 



									} 



									



									?>



								</div>



							</div>



						</div>



					</div>



				</div><!--Row Div End--> 



			</div><!-- user_form End--> 







			<!------------   save btn  -------------->  



			<div class="form-body user_form"> <!-- user_form Strat-->   



				<div class="row"><!--Row Div Strat--> 



					<div class="col-md-6 col-sm-6 col-xs-12"><!--save btn-->  	



						<input type="submit" value="<?php if($edit){ esc_html_e('Save','gym_mgt'); }else{ esc_html_e('Add Accountant','gym_mgt');}?>" name="save_staff" class="btn save_btn"/>



					</div>



				</div><!--Row Div End--> 



			</div><!-- user_form End--> 







		</form><!-- Accountant FORM END-->



	</div><!-- PANEL BODY DIV END-->



 <?php 



}



?>