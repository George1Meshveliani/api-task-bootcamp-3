<form method="post" action="/">
    <div class="flex justify-center">
        <input value="Save" type="submit" name="checked" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $check = $_POST['checked'];
    if (!empty($check)) {
        echo "Saved";
    } else {
        echo "try again later";
    }
}
?>


