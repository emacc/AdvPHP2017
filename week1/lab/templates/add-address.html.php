<h1>Add Address</h1>
<div class="container-fluid">
<form action="#" method="post">  
    <div class="row">
        <div class="col-md-6 labeldiv">Full Name</div><div class="col-md-6 col" style="display: inline-block"><input name="fullname" value="<?php echo $fullname; ?>" /></div>
    </div><br />
    <div class="row">
        <div class="col-md-6 labeldiv">Email</div><div class="col-md-6 col" style="display: inline-block"><input name="email" value="<?php echo $email; ?>" /></div>
    </div><br />
    <div class="row">
        <div class="col-md-6 labeldiv">Address Line 1</div><div class="col-md-6 col" style="display: inline-block"><input name="addressline1" value="<?php echo $addressline1; ?>" /></div>
    </div> <br />
    <div class="row">
        <div class="col-md-6 labeldiv">City</div><div class="col-md-6 col" style="display: inline-block"><input name="city" value="<?php echo $city; ?>" /></div>
    </div><br />
    <div class="row">
        <div class="col-md-6 labeldiv">State</div><div class="col-md-6 col" style="display: inline-block"><select name="state">
        <?php foreach ($states as $key => $value): ?> 
          <option value="<?php echo $key; ?>" <?php if ( $state == $key ): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
        <?php endforeach; ?>
            </select></div>
    </div><br />
    <div class="row">
        <div class="col-md-6 labeldiv">Zip</div><div class="col-md-6 col" style="display: inline-block"><input name="zip" value="<?php echo $zip; ?>" /></div>
    </div><br />
    <div class="row">
        <div class="col-md-6 labeldiv">Birthday</div><div class="col-md-6 col" style="display: inline-block"><input name="birthday" type="date" value="<?php echo $birthday; ?>" /></div>
    </div><br />
   <input type="submit" value="submit" class="btn btn-primary" />
</form>
</div>