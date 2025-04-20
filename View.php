<?php

include './include/head.php';
include './include/navbar.php';
include './classes/OOPClass.php';

$StudData = $students->fetchStudData("students");

if (isset($_GET['id'])) {

	$students->delete("students", $_GET['id']);
	header('location: View.php');
}

// $filterdata = [];
if (isset($_POST['srchSubmit'])) {
	$filterdata = $students->search("students", $_POST['search']);
	if (!$filterdata) {
		echo "Record Not Found !!";
	}
}
// print_r($filterdata);





?>
<div class="">
	<div>
		<div class="w-[80vw] mx-auto shadow-md mt-5 border-gray-500 px-4 py-10">
			<div>
				<form method="post" class="border border-1 rounded-lg flex w-[50vw] mx-auto ">
					<input type="search" name="search" class="border border-none px-3 w-full" placeholder="Search here ...">
					<input type="submit" value="Search" class="border border-none px-3" name="srchSubmit">
				</form>
			</div>

			<table class="mt-5 border-collapse border border-gray-400 w-full text-gray-700">
				<thead>

					<tr>
						<th class="px-3 border border-gray-300">id</th>
						<th class="px-3 border border-gray-300">Name</th>
						<th class="px-3 border border-gray-300">Course</th>
					</tr>
				</thead>
				<tbody>
						<?php if (empty($filterdata)) { ?>
							<?php foreach ($StudData as $row) {  ?>
								<tr>
									<td class="px-3 border border-gray-300"><?= empty($srchData) ? $row['id'] : $srchData['id'] ?></td>
									<td class="px-3 border border-gray-300"><?= empty($srchData) ? $row['NAME'] : $srchData['NAME']  ?></td>
									<td class="px-3 border border-gray-300"><?= empty($srchData) ? $row['course'] : $srchData['course'] ?></td>
									<td class="px-3 border border-gray-300">
										<a href="View.php?id=<?= $row['id'] ?>">❌ Delete</a>
									</td>
									<td class="px-3 border border-gray-300">
										<a href="edit.php?editId=<?= $row['id'] ?>">✏️ Edit</a>
									</td>
								</tr>
							<?php  }
						} else { ?>
							<tr>
								<td class="px-3 border border-gray-300"><?= $filterdata['id'] ?></td>
								<td class="px-3 border border-gray-300"><?= $filterdata['NAME']  ?></td>
								<td class="px-3 border border-gray-300"><?= $filterdata['course'] ?></td>
								<td class="px-3 border border-gray-300">
									<a href="View.php?id=<?= $filterdata['id'] ?>">❌ Delete</a>
								</td>
								<td class="px-3 border border-gray-300">
									<a href="edit.php?editId=<?= $filterdata['id'] ?>">✏️ Edit</a>
								</td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php

include './include/footer.php';
