<?php 
 
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/controllers/articleController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/sideBar.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/services/clientService.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/services/assuranceService.php");

?>

<div class="flex-1 p-4 ml-[172px]">
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-bold">Article List</h2>
            <button id="" class="bg-orange-600 text-black px-4 py-2 rounded">Add Article</button>
        </div>

    <div>
        <table id="table" class="min-w-full bg-black text-white rounded-xl">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>CLIENT</th>
                <th>ASSURANCE</th>
                <th>ACTION</th>
            </thead>
            <tbody>
                <?php 
                $articleService = new ArticleService();
                $articles = $articleService->display();
                foreach ($articles as $article): ?>
                <tr>
                <td class="py-2 px-4 border-b"><?= $article['articleId']; ?></td>
                <td class="py-2 px-4 border-b"><?= $article['name']; ?></td>
                <td class="py-2 px-4 border-b"><?= $article['description']; ?></td>
                <td class="py-2 px-4 border-b"><?= $article['clientId'] ?></td>
                <td class="py-2 px-4 border-b"><?= $article['assuranceId'] ?></td>
                <td class="py-2 px-4 border-b flex">
                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                <form action="../controllers/articleController.php" method="post">
                    <input type="hidden" name="action" value="deleteArticle">
                    <input type="hidden" name="deleteArticleId" value="<?= $article['articleId']; ?>">
                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                </form>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <div id="" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden  items-center flex justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Add Article</h2>
            <form id="" action="../controllers/articleController.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-600">Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-600">Description:</label>
                    <input type="text" id="description" name="description" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="clientId" class="block text-sm font-semibold text-gray-600">Select Client:</label>
                    <select name="clientId" id="clientId" class="w-full p-2 border rounded">
                        <?php
                        $clientService = new ClientService();
                        $clients = $clientService->display();
                        // var_dump($clients);
                        foreach ($clients as $client) {
                            echo "<option value='$client[clientId]'>$client[name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="assuranceId" class="block text-sm font-semibold text-gray-600">Select Assurance:</label>
                    <select name="assuranceId" id="assuranceId" class="w-full p-2 border rounded">
                        <?php
                        $AssuranceService = new AssuranceService();
                        $assurances = $AssuranceService->display();
                        // var_dump($clients);
                        foreach ($assurances as $assurance) {
                            echo "<option value='$assurance[assuranceId]'>$assurance[name]</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="action" value="addArticle" class="bg-green-400 text-white px-4 py-2 rounded">Add Article</button>
                <button type="button" id="" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </form>
        </div>
    </div>

<?php 
        require_once($_SERVER["DOCUMENT_ROOT"]."/assurance_app/app/views/includeFile/footer.php");

?>
