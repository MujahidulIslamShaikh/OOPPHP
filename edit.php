<?php

include './include/head.php';
include './include/navbar.php';
include './classes/OOPClass.php';

if(isset($_GET['editId'])){
    $data = $students->getData("students", $_GET['editId']);
}

if(isset($_POST['update'])){
    $students->updateData("students", $_POST['name'], $_POST['course'], $_GET['editId']);
    echo "Data Update Successfully !";
}   


?>
<div class=" mt-10">

<div class="w-[80vw] mx-auto ">
        <h1 class=" text-2xl mb-7 font-light">EDIT DATA HERE ...</h1>
    <form method="post" class="flex flex-col gap-3 w-[20vw]">
        <input type="text" value="<?= $data['NAME'] ?>" class="outline-none px-5 border border-gray-400" name="name" placeholder="Enter name">
        <input type="text" value="<?= $data['course'] ?>" class="outline-none px-5 border border-gray-400" name="course" placeholder="Enter course">
        <input type="submit" class="outline-none px-5 border border-gray-400" value="Update" name="update">
    </form>
    
</div>


</div>
<?php

include './include/footer.php';