<?php if(!empty($include_style)) {?>
<?php $this->load->view("$include_style"); ?>
<?php } ?>

<?php if(!empty($page_view)) {?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
	</head>
	<body>

<?php $this->load->view($page_view);?>
</body>
</html>

<?php } ?> 

<?php if(!empty($include_script)) {?>
<?php $this->load->view("$include_script"); ?>
<?php } ?>