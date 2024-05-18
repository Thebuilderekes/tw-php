<?php require("./views/partials/head.php"); ?>
<?php require("./views/partials/nav.php"); ?>

<main>

  <body class="bg-gray-200">

    <h1><?= $heading; ?></h1>

    <h2><?= $check; ?></h2>
    <form class="flex flex-col mx-12 p-4 items-center border border-1  border-green" action="notes.php"  method="POST">

<?php if (isset($error['form_error'])) : ?>
    <p class="text-red-500"><?= $error['form_error'];?></p>
<?php endif;?>
      <label>
        Name
        <input class="my-2" type="text" name="username" id="username" required>
      </label>
      <label>
        Email                
      <input class="my-2" type="email" name="email" id="email" required>
      </label>
 <span id="email-error"><?php echo $emailErr; ?></span>
      <button class="border rounded rounded-xl bg-blue-500 border-1 px-4 py-2" type="submit">submit</button>
    </form>

        <ul class="my-4 flex flex-col items-center">
            <?php foreach ($users as $user) :  ?>
      <li
      class="border border-b-1 rounded rounded-sm w-1/4 my-4 p-2"><?= $user['email']; ?></li>
            <?php endforeach;  ?>
    </ul>



</main>
<?php require("./views/partials/foot.php"); ?>
