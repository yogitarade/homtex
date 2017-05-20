<script>
    $(document).ready(function()
                {
                    $("#profile").validate(
                    {
                        rules:
                        {
                            fname:"required",
                            lanme:"required",
                           contact:{
                              required:true,
                              number:true,
                              maxlength:10,
                              minlength:10
                            },
                            useremail:{
                                required:true,
                                email:true
                            },
                            address:"required"
                        },
                          messages:
                        {
                            fname:"Enter first name",
                            lanme:"Enter last name",
                            contact:"Enter contact number",
                            useremail:"Enter valid email",
                            address:"Enter address"
                        },
                        submitHandler:function(form)
                        {
                            form.submit();
                        }
                     });
                });
    
</script>


<?php
if(!empty($records))
        {
        foreach($records as $data){
$attributes = array('class' => '', 'id' => 'profile');
echo form_open('dashboard/profile', $attributes); ?>
	<div class="page-header position-relative">
            <h1>
            Change Pofile
                    <small>
                            <i class="icon-double-angle-right"></i>
                    </small>
            </h1>
        </div><!--/.page-header-->
        <input type="hidden" id="user_id" name='user_id' value="<?php echo $data['id']; ?>">
    <div class="div">
        <label for="fnm">First Name<span class="required">*</span></label>
    </div>
    <input id="fname" type="text" name="fname" value="<?php echo $data['fname']; ?>" />
    <?php echo form_error('fname'); ?>
    <br>
    <div class="div">
        <label for="lnm">Last Name<span class="required"  >*</span></label>
    </div>
    <input id="lname" type="text" name="lname"  value="<?php echo $data['lname']; ?>"/>
    <?php echo form_error('lname'); ?>
    <br>
    <div class="div">
        <label for="contct">Contact<span class="required"  >*</span></label>
    </div>
    <input id="contact" type="text" name="contact" value='<?php echo $data['phone']; ?>' />
    <?php echo form_error('contact'); ?>
    <br>
      <div class="div">
        <label for="mail">Email<span class="required">  *</span></label>
    </div>
    <input id="useremail" type="email" name="useremail" value='<?php echo $data['email']; ?>' />
    <?php echo form_error('useremail'); 
      echo $error; ?>
    <br>
      <div class="div">
        <label for="addr">Address<span class="required" >*</span></label>
    </div>
    <textarea id="address" name="address"><?php echo $data['address']; ?></textarea>
    <?php echo form_error('address'); ?>
 
    <br>
    <div class="reset"> 
        <?php echo form_submit( 'submit', 'Submit','class="btn btn-info"'); ?>
        <button class="btn btn-info " type="reset">
               <i class="ace-icon fa fa-undo bigger-110"></i>Reset
       </button>
    </div>

<?php echo form_close();
        }}
        ?>