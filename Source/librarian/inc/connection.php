<?php

namespace Inc;

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "project_new");
if (!$link) {
   die('Could not connect: ');
}

class Connection
{
   public function connection()
   {
      $link = mysqli_connect("localhost", "root", "");
      mysqli_select_db($link, "project_new");
      return $link;
   }
}
