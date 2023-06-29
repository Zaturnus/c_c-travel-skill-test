<?php
include('nav_bar.php');
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- 
        Ideally, this should probably be a modal that would popup when a button is clicked from the members list
     -->
    <div class="container" style="padding: 40px;">
        <h1>Add Member</h1>
        <form action="add_member.php" method="POST">
            <!-- Inputs for the personal information -->
            <div class="form-group">
                <label for="given_name">Given Name</label>
                <input type="text" class="form-control" name="given_name" placeholder="Enter given name" required>
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                <label for="birth_date">Birth Date</label>
                <input type="date" class="form-control" name="birth_date" placeholder="Enter birth date" required>
            </div>
            <hr>
            <!-- Input for the contact information -->
            <div class="form-group">
                <label for="phone_num1">Phone Number 1</label>
                <input type="text" class="form-control" name="phone_num1" placeholder="Enter phone number 1" required>
                <div class="form-check" style="padding: 15px;">
                    <label for="phone_num2">Phone Number 2</label>
                    <input type="text" class="form-control" name="phone_num2" placeholder="Enter phone number 2">
                    <small id="optional" class="form-text text-muted">Optional</small>
                    <label for="phone_num3">Phone Number 3</label>
                    <input type="text" class="form-control" name="phone_num3" placeholder="Enter phone number 3">
                    <small id="optional" class="form-text text-muted">Optional</small>
                </div>
            </div>
            <div class="form-group">
                <label for="email_address1">Email Address 1</label>
                <input type="text" class="form-control" name="email_address1" placeholder="Enter email address 1" required>
                <div class="form-check" style="padding: 15px;">
                    <label for="email_address2">Email Address 2</label>
                    <input type="text" class="form-control" name="email_address2" placeholder="Enter email address 2">
                    <small id="optional" class="form-text text-muted">Optional</small>
                    <label for="email_address3">Email Address 3</label>
                    <input type="text" class="form-control" name="email_address3" placeholder="Enter email address 3">
                    <small id="optional" class="form-text text-muted">Optional</small>
                </div>
            </div>
            <hr>
            <!-- Inputs for other information -->
            <div class="form-group">
                <label for="membership_categ">Membership Category</label>
                <select class="custom-select custom-select-md mb-3" name="membership_categ" required>
                    <option selected>Select category...</option>
                    <option value="1">Session Basis</option>
                    <option value="2">Regular</option>
                    <option value="3">VIP</option>
                </select>
                <hr>
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address" maxlength="255" required>
            </div>
            <hr>
            <input type="submit" class="btn btn-primary" name="submit" value="Add Member">
        </form>
    </div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit']) && is_numeric($_POST['membership_categ'])) {
    // Sanitizing inputs 
    // Ideally personally identifiable information would be encrypted
    // More input validation could be done. like making sure the entered birthdate doesnt exceed
    // a certain date (to ensure theyre of a certain age, or not supposedly born in the future), etc
    $given_name = filter_input(INPUT_POST, 'given_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone_num1 = filter_input(INPUT_POST, 'phone_num1', FILTER_SANITIZE_NUMBER_FLOAT);
    $phone_num2 = filter_input(INPUT_POST, 'phone_num2', FILTER_SANITIZE_NUMBER_FLOAT);
    $phone_num3 = filter_input(INPUT_POST, 'phone_num3', FILTER_SANITIZE_NUMBER_FLOAT);
    $email_address1 = filter_input(INPUT_POST, 'email_address1', FILTER_VALIDATE_EMAIL);
    $email_address2 = filter_input(INPUT_POST, 'email_address2', FILTER_VALIDATE_EMAIL);
    $email_address3 = filter_input(INPUT_POST, 'email_address3', FILTER_VALIDATE_EMAIL);
    $membership_categ = $_POST['membership_categ'];
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    $birth_date = $_POST['birth_date'];

    $sql = "INSERT INTO members(
            `given_name`,
            `last_name`,
            `birth_date`,
            `phone_num1`,
            `phone_num2`,
            `phone_num3`,
            `email_address1`,
            `email_address2`,
            `email_address3`,
            `membership_categ`,
            `address`
        )
        VALUES(
            '$given_name',
            '$last_name',
            '$birth_date',
            '$phone_num1',
            '$phone_num2',
            '$phone_num3',
            '$email_address1',
            '$email_address2',
            '$email_address3',
            '$membership_categ',
            '$address'
        );";
    try {
        mysqli_query($conn, $sql);
        echo "<script>alert('Successfully added member!')</script>";
    } catch (mysqli_sql_exception) {
        echo "<script>alert('Could not add member')</script>";
    }
    mysqli_close($conn);
}
?>