
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inventori Gudang</title>
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/dp.jpeg" />

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script>
	function Timer() {
   var dt=new Date()
   document.getElementById('realtime').innerHTML=dt.getHours()+":"+dt.getMinutes()+":"+dt.getSeconds();
   setTimeout("Timer()",1000);
}
Timer();

</script>

</head>