<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">C&C Sports Club</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--Navigation Bar-->
    <!-- This could be more efficient if I were to use javascript in conjuction to php -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            if ($_SERVER['PHP_SELF'] == '/c_c-travel-skill-test/index.php') {
                echo "  
                        <li class='nav-item active'> 
                        <a class='nav-link' href='index.php'>Member Records</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='roster.php'>Member Roster</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='add_member.php'>Add Member</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='edit_member.php'>Edit Member</a>
                        </li>
                    ";
            } else if ($_SERVER['PHP_SELF'] == '/c_c-travel-skill-test/roster.php') {
                echo "  
                        <li class='nav-item'> 
                        <a class='nav-link' href='index.php'>Member Records</a>
                        </li>
                        <li class='nav-item active'>
                        <a class='nav-link' href='roster.php'>Member Roster</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='add_member.php'>Add Member</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='edit_member.php'>Edit Member</a>
                        </li>
                    ";
            } else if (($_SERVER['PHP_SELF'] == '/c_c-travel-skill-test/add_member.php')) {
                echo "  
                    <li class='nav-item'> 
                    <a class='nav-link' href='index.php'>Member Records</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='roster.php'>Member Roster</a>
                    </li>
                    <li class='nav-item active'>
                    <a class='nav-link' href='add_member.php'>Add Member</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='edit_member.php'>Edit Member</a>
                    </li>
                ";
            } else if (($_SERVER['PHP_SELF'] == '/c_c-travel-skill-test/edit_member.php')) {
                echo "  
                    <li class='nav-item'> 
                    <a class='nav-link' href='index.php'>Member Records</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='roster.php'>Member Roster</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='add_member.php'>Add Member</a>
                    </li>
                    <li class='nav-item active'>
                    <a class='nav-link' href='edit_member.php'>Edit Member</a>
                    </li>
                ";
            }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <!-- This should only be visible to the listing pages like Member Records and the roster -->
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>