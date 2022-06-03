<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <?php require 'SearchBar.php'?>
                <table class="min-w-full text-center" id="myTable">
                    <thead class="border-b">
                    <tr class="header">
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4" >Name</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4" >Channel</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4" >Country</th>
                    </tr>
                        <?php foreach ($results as $result): ?>
                        <tr class="border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo $result->show->name ?></td>
                            <?php if (!empty($result->show->network->name)): ?>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo ' ' . $result->show->network->name ?></td>
                            <?php else: ?>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "CNN" ?></td>
                            <?php endif; ?>
                            <?php if (!empty($result->show->network->country->name)): ?>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo $result->show->network->country->name ?></td>
                            <?php else: ?>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo "UK" ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </thead>
                </table>
                <script>
                    function searchFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<?php require 'GirlsShowForm.php' ?>


