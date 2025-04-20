<?php
session_start();
include './include/head.php';
include './include/navbar.php';

if(!isset($_SESSION['admin'])){
        header('location: login.php');    
} 

?>
<section class="bg-gray-700 text-white h-screen">

    <div class="w-[80vw] mx-auto py-10">
        <h1 class="text-5xl font-thin ">ADMIN PAGE HERE ....</h1>
    </div>
    
</section>

<?php


include './include/footer.php';