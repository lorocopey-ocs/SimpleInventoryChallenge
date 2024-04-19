<?php require __DIR__ . "/../partials/header.tpl.php"; ?>
<?php require __DIR__ . "/../partials/nav.tpl.php"; ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the products in your data</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="/products/create" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add product</a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td class="pl-4 pr-3 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900 sm:pl-6">
                                                <?= htmlspecialchars($product['name']); ?>
                                            </td>
                                            <td class="px-3 py-3.5 whitespace-nowrap text-sm text-gray-500">
                                                <?= $product['quantity']; ?>
                                            </td>
                                            <td class="px-3 py-3.5 whitespace-nowrap text-sm text-gray-500">
                                                $<?= $product['price']; ?>
                                            </td>
                                            <td class="pl-3 pr-4 py-3.5 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end items-center gap-x-2">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <form action="/products/delete" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="id" value="<?=$product['id']; ?>">
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php require __DIR__ . "/../partials/footer.tpl.php"; ?>
