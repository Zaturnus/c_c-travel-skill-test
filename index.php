<?php
include('nav_bar.php');
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/668f47e007.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Category</th>
                <th scope="col">Date Joined</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Getting data from table 'members' to display per row
            $sql = "SELECT * FROM members;";
            try {
                $result =  mysqli_query($conn, $sql);
            } catch (mysqli_sql_exception) {
                echo 'Could not query records from databse';
            }

            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $member_id = $row['member_id'];
                    $first_name = $row['given_name'];
                    $last_name = $row['last_name'];
                    $birth_date = $row['birth_date'];
                    $phone_num1 = $row['phone_num1'];
                    $email_address1 = $row['email_address1'];
                    $address = $row['address'];
                    $date_joined = $row['date_joined'];

                    switch ($row['membership_categ']) {
                        case 1:
                            $membership_categ = 'Regular Member';
                            break;
                        case 2:
                            $membership_categ = 'Session Basis';
                            break;
                        case 3:
                            $membership_categ = 'VIP Member';
                            break;
                    }

                    /**
                     * RE: Phone numbers and emails
                     * I didnt list all three phone numbers and emails from the results
                     * A better implementation would be to have it be a responsive list
                     * that would show the other two values if available for the corresponding field
                     * 
                     * RE: Editing and updating
                     * Supposedly, using something like javascript, clicking 'Edit' or 'Delete' should popup a modal that contains the form to edit the
                     * corresponding member's information. User would also then be able to delete the selected member if so.
                     * DELETE FROM members WHERE members_id='{id of selected item from the table}';
                     * Ideally, there could also be a bulk deletion of members as an option
                     */
                    echo "
                        <tr>
                            <th scope='row'>{$member_id}</th>
                                <td>{$first_name}</td>
                                <td>{$last_name}</td>
                                <td>{$birth_date}</td>
                                <td>{$phone_num1}</td>
                                <td>{$email_address1}</td>
                                <td>{$membership_categ}</td>
                                <td>{$address}</td>
                                <td>{$date_joined}</td>
                                <td><a href='edit_member.php'>Edit</a></td>
                                <td><a href='delete_member.php'>Delete</a></td>
                        </tr>
                        ";
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>
<?php

?>