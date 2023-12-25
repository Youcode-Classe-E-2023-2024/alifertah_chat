<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="">
<table id="myTable" border="1" cellpadding="5" cellspacing="0" width="100%" class="display">
    <tbody>
        <?php
            while($room = $rw->fetch_assoc()){
                echo("
                <tr class='bg-blue-400 w-[50%]' align='center'>
                    <td>$room[room_name]</td>
                    <td>
                        <a href='index.php?page=room&id=$room[room_id]&name=$room[room_name]'>join now</a>
                    </td>
                </tr>
                ");
            }
        ?>
    </tbody>
</body>
</html>