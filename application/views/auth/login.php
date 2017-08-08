<div class="col-md-4 col-md-push-4 white_block" >
<h1 class="mg0 pad10"><?php echo lang('login_heading');?></h1>


<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

   <div class="form-group">
       <label><?php echo lang('login_identity_label', 'identity');?></label>
       <input class="form-control" type="text" name="identity"  id="identity">
   </div>

   <div class="form-group">
       <label> <?php echo lang('login_password_label', 'password');?></label>
       <input class="form-control" type="password" name="password"  id="password">
       <input class="form-control" type="hidden" name="p"  value="<?=$this->input->get('p')?>">
   </div>

   <div class="form-group">
       <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
   </div>

<div class="form-group">
    <input class="form-control btn-primary" type="submit" name="submit" value="Login">
</div>
<?php echo form_close();?>

<p><a href="registration"><?php echo ('Registration');?></a></p>
</div>