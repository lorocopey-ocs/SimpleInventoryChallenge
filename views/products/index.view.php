<?php require __DIR__."/../partials/header.tpl.php"; ?>
<?php require __DIR__."/../partials/nav.tpl.php"; ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
                    <div class="mt-2">
                        <form method="GET">
                            <label for="search" class="sr-only">Search product</label>
                            <div class="mt-2">
                                <input type="search" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 sm:max-w-sm px-2" placeholder="Search a product by name...">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="/products/create" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add product</a>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <?php if (!$products): ?>
                    <div class="text-center text-gray-500">No products found</div>
                <?php else: ?>
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
                                                    <form action="/products/delete" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="name" value="<?=$product['name']; ?>">
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
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<?php require __DIR__."/../partials/footer.tpl.php"; ?>
