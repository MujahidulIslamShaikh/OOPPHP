<?php 
session_start();
include './include/head.php';
include './include/navbar.php';
include './classes/admin.php';


if(isset($_POST['adminLogin'])){

    $data = $admin->login($_POST['email'], $_POST['pass']);
    print_r($data);
    if($data){
        $_SESSION['admin'] = $_POST['email'];
        header('location: index.php');
    } else {
        echo 'Invalid email and password !';
    }
    

}

?>

<div class=" mt-10">

    <div class="w-[80vw] mx-auto ">
            <h1 class=" text-2xl mb-7 font-light ">ADMIN LOGIN HERE ...</h1>
        <form action="" method="post" class="flex flex-col gap-3 w-[20vw]">
            <input type="text" class="outline-none px-5 border border-gray-400" name="email" placeholder="Enter name">
            <input type="text" class="outline-none px-5 border border-gray-400" name="pass" placeholder="Enter course">
            <input type="submit" value="ADMIN LOGIN" name="adminLogin" class="hover:bg-gray-800 hover:text-gray-300 font-bold cursor-pointer outline-none px-5 border border-gray-400">
        </form>
        
    </div>
    

</div>



<?php include './include/footer.php';  ?>
