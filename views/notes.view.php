<?php require("./views/partials/head.php"); ?>
<?php require("./views/partials/nav.php"); ?>
<main>

    <body class="bg-blue-500">
        <h1><?= $heading; ?></h1>
        <form  action="post">
            <label>
                name
                <input type="text" name="name" id="name">
            </label>
            <label>
                password
                <input type="password" name="password" id="password">
            </label>

            <button type="submit">submit</button>
        </form>
        <!-- <ul>
            <?php foreach ($users as $user) :  ?>
                <li><?= $user['name']; ?></li>
            <?php endforeach;  ?>
        </ul> -->

        <ul>
            <?php foreach ($notes as $note) :  ?>
                <li><?= $note['body']; ?></li>
            <?php endforeach;  ?>
    </ul>



</main>
<?php require("./views/partials/foot.php"); ?>
