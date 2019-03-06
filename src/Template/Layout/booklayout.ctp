<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo isset($title) ? $title : "" ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $this->Url->css('bootstrap.min.css'); ?>">
  <style>
  
  
  
  .owtcontainer{
      margin-top:50px;
      
  }
  </style>

</head>
<body>

<div class="container owtcontainer">
  <?= $this->Flash->render() ?>
  <?= $this->fetch("content"); ?>
</div>



<script type="text/javascript">
  
</script>
</body>
</html>
