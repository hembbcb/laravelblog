<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GEOSPATIAL BHUTAN</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="backend/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="backend/css/AdminLTE.css">
 
  <link rel="stylesheet" href="backend/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
            @yield('content')



            
<script src="backend/js/jquery-2.2.3.min.js"></script>
<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/plugins/iCheck/icheck.min.js"></script>


<script>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>


</body>
</html>
