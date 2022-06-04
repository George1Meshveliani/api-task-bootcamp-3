<div class="flex justify-center">
    <div class="mb-3 xl:w-96">
        <form method="post" action="/">
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
        </form>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $key_word = $_POST['keyword'];
    if (empty($key_word)) {
        echo "Name is empty";
    }
    else {
        echo $key_word;
    }
}
?>