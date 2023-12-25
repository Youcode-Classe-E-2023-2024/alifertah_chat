<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
</head>
<body>
    <nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
        <a href="index.php?page=home" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark">Home</a>
    </div>
    <div>
        <?php
            if(isset($_SESSION["id"])){
                echo ("
                    <div class='flex'>
                        <a href='index.php?page=rooms' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>rooms</a>
                        <a href='index.php?page=createRoom' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>create room</a>
                        <form method='post' action='index.php?page=login'>
                            <button class='text-lg underline text-red-500 hover:text-blue-dark ml-2' type='submit' name='logout'> 
                            Logout
                            </button>
                        </form>
                    </div>
                    "
            );
            } else {
                echo ("
                    <a href='index.php?page=login' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>login</a>
                    "
            );
            }
        ?>
    </div>
    </nav>
    
    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>

    <footer></footer>
    <script src="<?= PATH ?>assets/js/main.js"></script>
</body>
</html>