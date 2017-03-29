<h1>Add Address</h1>
<form action="#" method="post">   
   Full Name: <input name="fullname" value="<?php echo $fullname; ?>" /> <br />
   Email: <input name="email" value="<?php echo $email; ?>" /> <br />
   Address Line 1: <input name="addressline1" value="<?php echo $addressline1; ?>" /> <br />
   City: <input name="city" value="<?php echo $city; ?>" /> <br />
   State: <select name="state">
        <?php foreach ($states as $key => $value): ?> 
          <option value="<?php echo $key; ?>" <?php if ( $state == $key ): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
        <?php endforeach; ?>
   </select>   <br />
   Zip: <input name="zip" value="<?php echo $zip; ?>" /> <br />
   Birthday: <input name="birthday" type="date" value="<?php echo $birthday; ?>" /> <br />
   <input type="submit" value="submit" class="btn btn-primary" />
</form>