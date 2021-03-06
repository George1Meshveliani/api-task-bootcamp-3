<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<div>
    <?php require 'SearchBar.php'?>
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-4">

                <?php foreach ($results as $result): ?>
                    <div class="flex flex-col items-center p-8 transition-colors duration-200 transform border cursor-pointer rounded-xl hover:border-transparent group hover:bg-blue-600 dark:border-gray-700 dark:hover:border-transparent">
                        <?php if (empty($result->show->image->medium)): ?>
                            <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300" src='https://thumbs.dreamstime.com/z/healthy-blonde-woman-portrait-beauty-girl-long-healthy-blond-hair-perfect-clear-skin-natural-beauty-healthy-blonde-woman-139081463.jpg' alt="img">
                        <?php else: ?>
                            <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300" src='<?= $result->show->image->medium ?>' alt="img">
                        <?php endif; ?>

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white group-hover:text-white"><?= $result->show->name ?></h1>

                        <?php if (empty($result->show->network->name)): ?>
                            <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">MTV</p>
                        <?php else: ?>
                            <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300"><?= $result->show->network->name ?></p>
                        <?php endif; ?>
                        <!--- here -->
                    </div>
                <?php endforeach; ?>
            </div>
    </section>
</div>

