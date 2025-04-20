<?php

include './include/head.php';


?>

<div class="shadow-sm">
    <nav class="w-[80vw] mx-auto flex justify-between items-center">
        <a href="index.php">
            <h1 class="text-3xl font-thin">Abcde</h1>
        </a>
        <div class="flex gap-4 items-center">
            <a href="insertForm.php">Insert From</a>
            <a href="View.php">View</a>  
            <a href="add_admin.php">Add Admin</a>  
        </div>

        <div class="flex items-center gap-4 font-medium ">
            <a href="signup.php">Signup</a>
            <a href="login.php">Login</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
</div>



<?php

include './include/footer.php';