<?php
spl_autoload_register(function ($clase) {
 include "../modelo/$clase.php";
});