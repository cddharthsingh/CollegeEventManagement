<div class="col-md-8">
  
<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.js" type="text/javascript"></script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><b>User Registration</b></h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=create" method="post">
    <div class="box-body">
      <div class="form-group">
      	<!-- username -->
        <label for="exampleInputEmail1">Name of Department</label>
        <span id="sprytf_name">
		<input type="text" name="dname" class="form-control input-sm" placeholder="Name of Department">
		<span class="textfieldRequiredMsg">Name is required.</span>
		<span class="textfieldMinCharsMsg">Name must specify at least 6 characters.</span>
		</span>
      </div>
      <!-- address -->
	  <div class="form-group">
        <label for="exampleInputEmail1">Head of Department</label>
		<span id="sprytf_address">
        <textarea name="hod" class="form-control input-sm" placeholder="Head of Department"></textarea>
		<span class="textareaRequiredMsg">Name of HoD is required.</span>
		<span class="textfieldMinCharsMsg">Name of HoD must specify at least 6 characters.</span>	
		</span>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Phone</label>
		<span id="sprytf_phone">
        <input type="text" name="phone" class="form-control input-sm"  placeholder="Phone number">
		<span class="textfieldRequiredMsg">Phone number is required.</span>
		</span>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
		<span id="sprytf_email">
        <input type="text" name="email" class="form-control input-sm" placeholder="Enter email">
		<span class="textfieldRequiredMsg">Email ID is required.</span>
		<span class="textfieldInvalidFormatMsg">Please enter a valid email (user@domain.com).</span>
		</span>
      </div>
      <div class="form-group">
        <label for="password">Set Password</label>
		<span id="sprytf_name">
        <input type="text" name="password" class="form-control input-sm" placeholder="*********">
		<span class="textfieldRequiredMsg">Password is required.</span>
		<span class="textareaMinCharsMsg">Password must specify at least 6 characters.</span>
		</span>
      </div>
	 <!-- user type -->
	 <div class="form-group">
        <label for="exampleInputEmail1">Permission</label>
		<span id="sprytf_type">
        <select name="type"  class="form-control input-sm">
			<option value=""> -- select user type --</option>
			<option value="student">Student</option>
			<option value="teacher">Teacher</option>
		</select>
		<span class="selectRequiredMsg">Please select Permission.</span>
		</span>
		
      </div>
	  		  
	  
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<!-- /.box -->
<script type="text/javascript">
<!--
var sprytf_name 	= new Spry.Widget.ValidationTextField("sprytf_name", 'none', {minChars:6, validateOn:["blur", "change"]});
var sprytf_address 	= new Spry.Widget.ValidationTextarea("sprytf_address", {minChars:10, isRequired:true, validateOn:["blur", "change"]});
var sprytf_phone 	= new Spry.Widget.ValidationTextField("sprytf_phone", 'none', {validateOn:["blur", "change"]});
var sprytf_mail 	= new Spry.Widget.ValidationTextField("sprytf_email", 'email', {validateOn:["blur", "change"]});
//var sprytf_rdate 	= new Spry.Widget.ValidationTextField("sprytf_rdate", "date", {format:"yyyy-mm-dd", useCharacterMasking: true, validateOn:["blur", "change"]});
//var sprytf_rtime 	= new Spry.Widget.ValidationTextField("sprytf_rtime", "time", {hint:"i.e 20:10", useCharacterMasking: true, validateOn:["blur", "change"]});
//var sprytf_ucount 	= new Spry.Widget.ValidationTextField("sprytf_ucount", "integer", {validateOn:["blur", "change"]});
var sprytf_type 	= new Spry.Widget.ValidationSelect("sprytf_type");
//-->
</script>
</div>