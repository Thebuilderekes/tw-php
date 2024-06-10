<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>
<main>
  <body class="bg-green-500">

    <?php 
   
     $heading = "Register page";
    ?>
    <h1><?= $heading; ?></h1>

    <form class= "flex items-center flex-col gap-2" id="user-form" action="../controllers/register.php" method="POST">

      <?php if (isset($error['form_error'])) : ?>
        <p class="text-red-500"><?= $error['form_error']; ?></p>
      <?php endif; ?>
      <?php ?>
      <label for="email" class="flex justify-between gap-2">
        Email 
        <input type="email" name="email" id="email">
      </label>
      <label for="password">
        Password
        <input type="password" name="password" id="password"> 
      </label>
      <button class="border rounded rounded-xl bg-blue-500 border-1 px-4 py-2" type="submit">submit</button>
      <form>


    <ul class="my-4 flex flex-col items-center">
      <?php foreach ($usernames as $user) :  ?>
        <li class="border border-1 my-4 p-2"><?= $user["email"]; ?></li>

      <?php endforeach;  ?>

</main>
<?php require("partials/foot.php"); ?>

