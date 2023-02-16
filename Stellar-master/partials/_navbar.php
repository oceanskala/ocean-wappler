<?php
require("db.php");

$page = $_SERVER['PHP_SELF'];
$sec = "20";


$network = $db->prepare('SELECT * FROM smartContracts');
$network->execute();
$ntcek = $network->fetchAll(PDO::FETCH_ASSOC);
$curr_network;
$z=0;
$incr=0;

foreach($ntcek as $sc){
  
  if($ntcek[$z]["activated"]==1){
    $curr_network = $ntcek[$z]["networkk"];
  }
  $z++;
}

?>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex align-items-center">
    <a class="navbar-brand brand-logo" href="index.html">
      <img src="http://localhost:8100/Stellar-master/images/logo.svg" alt="logo" class="logo-dark" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="http://localhost:8100/Stellar-master/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
    <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Ocean Dashboard!</h5>
    <ul class="navbar-nav align-items-center navbar-nav-right ml-auto">
      <li class="nav-item language">
      <li class="dropdown-item" style="padding: 0;">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" data-target="#dropbro" href="javascript:void();" style="margin-right: 3%;"><?php echo($curr_network);?> <i class="fa-solid fa-caret-down"></i></a>
      </li>
      <ul id="dropbro" class="dropdown-menu dropdown-menu-left navbar-dropdown py-2t" style=" height:300px; width:18%; overflow:hidden; overflow-y:scroll;">
        <?php foreach($ntcek as $f){ ?>

        <?php if($ntcek[$incr]["networkk"]=="Ethereum" || $ntcek[$incr]["networkk"]=="Ethereum(Ropsten)"){?>
        <a class="networks" href="../../partials/filter.php?active=<?php echo ($ntcek[$incr]["id"]);?>&back=<?php echo $_SERVER["REQUEST_URI"];?>">
          <li class="dropdown-item"><?php echo($ntcek[$incr]["networkk"]);?></li>
        </a>
        <?php }else{?>
        <a class="networks" href="../../partials/filter.php?active=<?php echo ($ntcek[$incr]["id"]);?>&back=<?php echo $_SERVER["REQUEST_URI"];?>">
          <li class="dropdown-item"><?php echo($ntcek[$incr]["networkk"]);?></li>
        </a>
        <?php }?>
        <?php   $incr++;  } ?>

      </ul>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>