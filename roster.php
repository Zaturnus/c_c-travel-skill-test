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
    <table class="table">
        <thead>
            <tr>
                <!-- 
                    I wasnt sure what the year value is supposed to come from
                    So I made the assumption that it would simply be the current
                    year they'll be in the roster for the purpose of this test. 
                 -->
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Year</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Date Paid</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Getting data from table 'members'
            $sql = "SELECT 
                    members.member_id,
                    members.given_name,
                    members.last_name,
                    roster.member_paid_amnt,
                    roster.member_paid_date,
                    YEAR(roster.year) as year
                    FROM members LEFT JOIN roster 
                    ON members.member_id=roster.member_id";
            $result =  mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $member_id = $row['member_id'];
                    $name = $row['given_name'] . ' ' . $row['last_name'];
                    $year = $row['year'];
                    $member_paid_amnt = $row['member_paid_amnt'];
                    $member_paid_date = $row['member_paid_date'];
                    echo "
                        <tr>
                            <th scope='row'>{$member_id}</th>
                                <td>{$name}</td>
                                <td>{$year}</td>
                                <td>{$member_paid_amnt}</td>
                                <td>{$member_paid_date}</td>
                        </tr>
                        ";
                }
            }

            ?>

        </tbody>
    </table>
</body>

</html>