<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>
<main>
<body class="bg-red-500">

 <h1><?= $heading; ?></h1>
 <!--<p><?=$error['form-error']?></p>-->
      <form action="handleForm.php" method="post">
         <label for="name">
         name 
         <input type="text" name="name" id="name">
         </label>
         <label for="password">
         password
         <input type="password" name="password" id="password"> 
         </label>
         <input type="submit">
    <form>
</main>
<?php require("partials/foot.php"); ?>

