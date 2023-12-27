<?php 
 
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/controllers/clientController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/header.php");

?>

<div class="flex-1 p-4">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-bold">Client List</h2>
            <button id="" class="bg-green-400 text-black px-4 py-2 rounded">Add Client</button>
        </div>

    <div>
        <table id="table" class="min-w-full bg-green-400 rounded-xl">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>CIN</th>
                <th>NUMBER</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php 
                $clientService = new ClientService();
                $clients = $clientService->display();
                foreach ($clients as $client): ?>
                <tr>
                <td class="py-2 px-4 border-b"><?= $client['clientId']; ?></td>
                <td class="py-2 px-4 border-b"><?= $client['name']; ?></td>
                <td class="py-2 px-4 border-b"><?= $client['cin']; ?></td>
                <td class="py-2 px-4 border-b"><?= $client['number'] ?></td>
                <td class="py-2 px-4 border-b flex">
                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                <form action="../controllers/clientController.php" method="post">
                    <input type="hidden" name="action" value="deleteClient">
                    <input type="hidden" name="deleteClientId" value="<?= $client['clientId']; ?>">
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                </form>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <div id="addAssuranceModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center flex justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Add Client</h2>
            <form id="" action="../controllers/clientController.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="cin" class="block text-sm font-semibold text-gray-600">Cin:</label>
                    <input type="text" id="cin" name="cin" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="number" class="block text-sm font-semibold text-gray-600">Number:</label>
                    <input type="tel" id="number" name="number" class="w-full p-2 border rounded">
                </div>
                <button type="submit" name="action" value="addClient" class="bg-green-400 text-white px-4 py-2 rounded">Add client</button>
                <button type="button" id="" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </form>
        </div>
    </div>

<?php 
        require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/footer.php");

?>
