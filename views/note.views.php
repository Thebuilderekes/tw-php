<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>

<main>
  <body class="bg-gray-200">
    <h1><?= $heading; ?></h1>
    <h2><?= $check; ?></h2>
    <form class="flex flex-col mx-12 p-4 items-center border border-1  border-green" action="../pages/note.php" method="POST">

      <?php if (isset($error['form_error'])) : ?>
        <p class="text-red-500"><?= $error['form_error']; ?></p>
      <?php endif; ?>
      <label for="message"class="flex justify-center items-center gap-2">  
        message

        <textarea class="my-2" rows="5" cols="20" name="message" id="message"></textarea>
      </label>
      <button class="border rounded rounded-xl bg-blue-500 border-1 px-4 py-2" type="submit">submit</button>
    </form>

    <ul class="my-4 flex flex-col items-center">
      <?php foreach ($notes as $note) :  ?>
        <li class="border border-b-1 rounded rounded-sm w-1/4 my-4 p-2"><?= $note["body"]; ?></li>

      <?php endforeach;  ?>
    </ul>

</main>
<?php require("partials/foot.php"); ?>
