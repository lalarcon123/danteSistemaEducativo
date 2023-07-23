<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<!-- Main content -->
<div class="wrapper">
<br>
<br>
<br>
<section class="content">
  <div class="container-fluid">
		<div><div><iframe src="detallesusuarios.php" width="100%" height="800px" frameborder="0" allowtransparency="true" style="background-color: white"></iframe></div></div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php include_once('layouts/footer.php'); ?>

