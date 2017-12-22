
<form method="post" >
    <label>name</label>
    <input name="name" value="<?=$employee->name ?>">
    <br>
    <label>salary</label>
    <input name="salary" value="<?=$employee->salary ?>">
    <br>

    <label>age</label>
    <input name="age" value="<?=$employee->age ?>">
    <br>
    <label>address</label>
    <input name="address" value="<?=$employee->address ?>">
    <br>
    <input type="submit" name="edit">
</form>
