<?php require __DIR__ . "/../partials/header.tpl.php"; ?>
<?php require __DIR__ . "/../partials/nav.tpl.php"; ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Enter your product</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-10">

            <form class="space-y-6" method="POST">

                <div>
                    <label for="name" class="ml-px block pl-4 text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" class="block w-full rounded-full border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Banana" value="<?= $_POST['name'] ?? "" ?>">
                    </div>
                    <?php if (isset($errors['name'])) : ?>
                        <p class="mt-2 text-sm text-red-600" id="name-error"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="price" class="ml-px block pl-4 text-sm font-medium leading-6 text-gray-900">Price</label>
                    <div class="mt-2">
                        <input type="text" name="price" id="price" class="block w-full rounded-full border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0.00" value="<?= $_POST['price'] ?? "" ?>">
                    </div>
                    <?php if (isset($errors['price'])) : ?>
                        <p class="mt-2 text-sm text-red-600" id="price-error"><?= $errors['price'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="quantity" class="ml-px block pl-4 text-sm font-medium leading-6 text-gray-900">Quantity</label>
                    <div class="mt-2">
                        <input type="number" name="quantity" id="quantity" class="block w-full rounded-full border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0" value="<?= $_POST['quantity'] ?? "" ?>">
                    </div>
                    <?php if (isset($errors['quantity'])) : ?>
                        <p class="mt-2 text-sm text-red-600" id="quantity-error"><?= $errors['quantity'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- <label for="price">Price</label>
                <input type="number" name="price" id="price" required> -->
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add product</button>
                </div>
            </form>
            <a href="/products">Back to Products</a>
        </div>

    </div>
</main>

<?php require __DIR__ . "/../partials/footer.tpl.php"; ?>