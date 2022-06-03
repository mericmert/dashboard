<form method="post" action="../CRUD/edit.php" class="edit-form ui form">
  <input type="hidden" name="id" value="<?php  echo $_SESSION["id"]; ?>">

  <div class="field">
    <label for="fullname">Full name</label>
    <input type="text" name="fullname" value="<?php echo $_SESSION["fullname"]?>" />
  </div>
  <div class="field">
    <label for="age">Age</label>
    <input type="text" name="age" value="<?php echo $_SESSION["age"] ?>" />
  </div>
  <div class="field">
    <label for="salary">Salary</label>
    <input type="text" name="salary" value="<?php echo $_SESSION["salary"] ?>" />
  </div>
  <div class="field">
    <label for="dayoff">Off-day</label>
    <input type="text" name="dayoff" value="<?php echo $_SESSION["dayoff"] ?>" />
  </div>
  <div class="field">
  <label for="contract_time">Contract Time</label>
        <input type="text" name="contract_time" value="<?php echo $_SESSION["contract_time"] ?>" />
  </div>
  <button class="ui button" name="submit" type="submit">Submit</button>
</form>


