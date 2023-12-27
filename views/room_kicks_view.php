<form action="" method="post">
<form action="" method="post">
    <select name="kicked" id="">
        <?php
            while($usr = $allUsers->fetch_assoc()){
                echo "<option>"  .
                $usr['users_id'] . "</option>";
            }
        ?>
    </select>    
    <button type="submit" name="kick">KICK</button>
</form>

</form>