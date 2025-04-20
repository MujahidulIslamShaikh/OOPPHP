<?php 
include './include/head.php';
include './include/navbar.php';
include './classes/OOPClass.php';

if(isset($_POST['submit'])){

    $students->insert("students", $_POST['name'], $_POST['course']);

}

?>

<div class=" mt-10">

    <div class="w-[80vw] mx-auto ">
            <h1 class=" text-2xl mb-7 font-light">Insert data here ...</h1>
        <form action="" method="post" class="flex flex-col gap-3 w-[20vw]">
            <input type="text" class="outline-none px-5 border border-gray-400" name="name" placeholder="Enter name">
            <input type="text" class="outline-none px-5 border border-gray-400" name="course" placeholder="Enter course">
            <input type="submit" class="outline-none px-5 border border-gray-400" value="Submit" name="submit">
        </form>
        
    </div>
    

</div>



<?php include './include/footer.php';  ?>
