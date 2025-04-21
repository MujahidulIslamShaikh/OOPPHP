<?php
session_start();
include './include/head.php';
include './include/navbar.php';
include './classes/OOPClass.php';
include './classes/admin.php';

print_r($_POST);
$allAdminData = $admin->getallAdmins();
if(isset($_GET['del_ad_id'])){
    $students->delete('admins', $_GET['del_ad_id']);
    header('location: add_admin.php');
}


if (isset($_POST['addAdmin'])) {
    if (empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['cpass'])) {
        echo '❌ Fill all fields!';
    } else if ($_POST['pass'] !== $_POST['cpass']) {
        echo 'password not match !';
    } else {
        $data = $admin->addAdmin($_POST['email'], $_POST['pass']);
        if ($data) {
            echo 'New admin add success !';
            header('location: add_admin.php');
        } else {
            echo 'not success ! new admin';
        }
    }
}

?>

<div class=" mt-10">

    <div class="w-[80vw] mx-auto ">
        <h1 class=" text-2xl mb-7 font-light ">ADD ADMIN HERE ...</h1>
        <form action="" method="post" class="flex flex-col gap-3 w-[20vw]">
            <input type="text"
                value="<?= isset($_POST["addAdmin"]) ? htmlspecialchars($_POST['email']) : ''; ?>"
                name="email"
                class="outline-none px-5 border border-gray-400"
                placeholder="Enter email">
            <input type="text" value="<?php echo isset($_POST["addAdmin"]) ? $_POST['pass'] : ''; ?>" name="pass" class="outline-none px-5 border border-gray-400" placeholder="Enter password">
            <input type="text" value="<?= isset($_POST["addAdmin"]) ? $_POST['cpass'] : ''; ?>" name="cpass" class="outline-none px-5 border border-gray-400" placeholder="Confirm password">
            <input type="submit" value="ADMIN_LOGIN" name="addAdmin" class="hover:bg-gray-800 hover:text-gray-300 font-bold cursor-pointer outline-none px-5 border border-gray-400">
        </form>

        <table class="mt-5 border-collapse border border-gray-400 w-full text-gray-700">
            <tr>
                <th class="px-3 border border-gray-300">id</th>
                <th class="px-3 border border-gray-300">email</th>
                <th class="px-3 border border-gray-300">pass</th>
            </tr>
            <?php foreach ($allAdminData as $data) { ?>
                <tr>
                    <td class="px-3 border border-gray-300"><?= $data['id'] ?></td>
                    <td class="px-3 border border-gray-300"><?= $data['email'] ?></td>
                    <td class="px-3 border border-gray-300"><?= $data['pass'] ?></td>
                    <!-- <td class="px-3 border border-gray-300"><a href="add_admin?del_ad_id=<?= $data['id']; ?>">Delete</a></td> -->
                    <td class="px-3 border border-gray-300">
                        <a href="add_admin.php?del_ad_id=<?= htmlspecialchars($data['id']); ?>">Delete</a>
                    </td>

                </tr>
            <?php } ?>
        </table>
    </div>


</div>



<?php include './include/footer.php';  ?>