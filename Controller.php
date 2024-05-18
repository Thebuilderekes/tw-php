 <?php
class Controller
{
   public function view($name)
  {

    $filename = "./".$name.".php";
    if (file_exists($filename)) {
       require $filename;
    } else {
      $filename = "./404.php";
      require $filename;

  }
  }
}
