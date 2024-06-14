<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>

<?php require('../controllers/display-users.php'); ?>
  <body class="bg-grey-100">

    <h1><?= $heading; ?></h1>

<main class="flex flex-col items-center">
    <h2 class="text-xl font-bold">Register Your account</h2>
    <form class= "flex items-center border-2 w-1/2 p-4 rounded border-blue-300  flex-col gap-2" id="user-form" action="../controllers/register.php" method="POST">

      <?php if (isset($error['form_error'])) : ?>
        <p class="text-red-500"><?= $error['form_error']; ?></p>
      <?php endif; ?>
      <label for="email" class="flex justify-between gap-2">
        Email 
        <input class="border border-2 border-blue-300" type="email" name="email" id="email">
      </label>
      <label for="password">
        Password
        <input  class="border border-2 border-blue-300" type="password" name="password" id="password"> 
      </label>
      <button class="border rounded rounded-xl bg-blue-500 border-1 px-4 py-2" type="submit">Register</button>
      </form>


    <ul class="my-4 flex flex-col items-center">
      <?php foreach ($usernames as $user) :  ?>
        <li class="border border-1 my-4 p-2"><?= $user["email"]; ?></li>

      <?php endforeach;  ?>
      </ul>
</main>

<?php require "../controllers/register-process.php";?>
<?php require("partials/foot.php"); ?>
