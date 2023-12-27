<?php 
 
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/controllers/assureurController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/sideBar.php");


?>
<!-- <div class="bg-yellow-400 text-black w-1/6 p-4">
    <h1 class="text-2xl font-bold mb-4">Insurance</h1>
    <ul class="space-y-2">
        <li><a href="../../app/views/Client.php" class="hover:text-yellow-300">Clients</a></li>
        <li><a href="../../app/views/claims.php" class="hover:text-yellow-300">Claims</a></li>
        <li><a href="../../app/views/premiums.php" class="hover:text-yellow-300">Premiums</a></li>
        <li><a href="../../app/views/articles.php" class="hover:text-yellow-300">Articles</a></li>
        <li><a href="../../app/views/Assurance.php" class="hover:text-yellow-300">Assurances</a></li>
    </ul>
</div> -->

    <div class="flex-1 p-4 ml-[175px]">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-bold">Assurances List</h2>
            <button id="addAssuranceBtn" class="bg-orange-600 text-black px-4 py-2 rounded">Add Assurance</button>
        </div>

        
            <table id="table" class="min-w-full bg-black text-white rounded-xl">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">ADDRESS</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $AssuranceService = new AssuranceService();
                     $assurances = $AssuranceService->display();
                     foreach ($assurances as $assurance) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= $assurance['assuranceId']; ?></td>
                            <td class="py-2 px-4 border-b"><?= $assurance['name']; ?></td>
                            <td class="py-2 px-4 border-b"><?= $assurance['address']; ?></td>
                            <td class="py-2 px-4 border-b flex">
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <form action="../controllers/assureurController.php" method="post">
                                    <input type="hidden" name="action" value="deleteAssurance">
                                    <input type="hidden" name="deleteAssuranceId" value="<?= $assurance['assuranceId']; ?>">
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>

    <div id="addAssuranceModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden  items-center flex justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Add Assurance</h2>
            <form id="addAssuranceForm" action="../controllers/assureurController.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-semibold text-gray-600">Address:</label>
                    <input type="text" id="address" name="address" class="w-full p-2 border rounded">
                </div>
                <button type="submit" name="action" value="addAssurance" class="bg-green-400 text-white px-4 py-2 rounded">Add Assurance</button>
                <button type="button" id="closeAddAssuranceModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </form>
        </div>
    </div>
<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/footer.php");
?>