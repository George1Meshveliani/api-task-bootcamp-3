<div class="flex justify-center">
    <div class="mb-3 xl:w-96">
        <form method="post" action="/dashboard">
            <?php if ($_SERVER['REQUEST_URI'] !== '/dashboard'):  ?>
        <input
            type="text"
            name="keyword"
            id="myInput"
            onkeyup="searchFunction()"
            placeholder="Choose your favorite show..."
            title="Type in a name"
            class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  "
                  required
        >
        <br />
            <div class="flex justify-center">
                <input type="submit"
                       class="
                               px-4 py-2
                               font-medium tracking-wide
                               text-white capitalize
                               transition-colors duration-200
                               transform bg-blue-600 rounded-md
                               hover:bg-blue-500 focus:outline-none
                               focus:ring focus:ring-blue-300 focus:ring-opacity-80
                              "
                >
            </div>
            <?php else: ?>
                <meta http-equiv="refresh" content="0">
            <h1>Here is list of chosen shows</h1>
                <?php foreach ($names_array as $name_array): ?>
                    <u><li><?php echo $name_array ?></li></u>
                <?php endforeach; ?>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php
use App\ApiControllers\FetchApi;
use App\DatabaseControllers\InsertExample;

//use PDO;


$url = "https://api.tvmaze.com/search/shows?q=girls";
$data = new FetchApi($url);

$results = $data->getData();

$db = new PDO('mysql:host=db;dbname=favorite_shows_list', 'root', 'changeme');
$table_name = 'shows_list';
$data_to_insert = new InsertExample($db);

$names = [];
$channel = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key_word = $_POST['keyword'];
    foreach ($results as $result) {
        if ($result->show->name === $key_word) {
            $name = $key_word;
            $channel = $result->show->network->name;
            $data_to_insert->insertDataExample($table_name, $name, $channel);
        }
        if (!in_array($result->show->name, $names)) {
            $names[] = $result->show->name;
        }
    }
    if (!in_array($key_word, $names)) {
        echo 'There is no ' . $key_word . ' in list, try again';
    }
}