<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<div>
<!--    <form action="/" method="post" >-->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">Choose your favorite girls show</h1>
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by a tv show name..." required="">
                </div>
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

<!--    </form>-->
    <?php require 'GirlsShowForm.php' ?>
</div>