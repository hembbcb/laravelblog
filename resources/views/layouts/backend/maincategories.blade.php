<html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>GEOSPATIAL BHUTAN</title>
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                
                
                
                <link rel="stylesheet" href="/backend/css/bootstrap.min.css">
                <link rel="stylesheet" href="/backend/css/custom.css">
                <link rel="stylesheet" href="/backend/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css">
                <link rel="stylesheet" href="/backend/plugins/font-awesome/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                <link rel="stylesheet" href="/backend/css/AdminLTE.css">
                <link rel="stylesheet" href="/backend/plugins/simple-mde/simplemde.min.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
                <link rel="stylesheet" href="/backend/css/skins/_all-skins.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css">
                <link rel="stylesheet" href="/backend/plugins/datetimepicker/stylesheets/bootstrap-datetimepicker.css">

            </head>

<body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('layouts.backend.navbar')
            @include('layouts.backend.sidebar')

            @yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; <a>GEOSPATIAL BHUTAN</a>.</strong>
  </footer>

</div>

<script src="/backend/js/jquery-2.2.3.min.js"></script>
<script src="/backend/plugins/simple-mde/simplemde.min.js"></script>
<script src="/backend/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="/backend/js/bootstrap.min.js"></script>
<script src="/backend/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script src="/backend/plugins/datetimepicker/javascripts/bootstrap-datetimepicker.js"></script>


<script type="text/javascript">

$('#title').on('keyup',function ()

{
  var theTitle =this.value.toLowerCase().trim(); 
  
          slugInput =$('#slug'),
  theSlug = theTitle
                    .replace(/&/g,'-and-')
                    .replace(/[^a-z0-9-]+/g,'-')
                    .replace(/\-\-+$/g,'-');
                    

  slugInput.val(theSlug);

});

</script>



<script type="text/javascript">

        $('ul.pagination').addClass('no-margin pagination-sm');
</script>

</body>
</html>