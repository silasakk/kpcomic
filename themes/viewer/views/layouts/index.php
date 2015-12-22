<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <base href="<?php echo base_url() ?>">
    <title><?php echo $template['title']; ?></title>

    <!-- Bootstrap -->
    <link href="themes/viewer/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="themes/viewer/assets/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="themes/viewer/assets/css/rangeslider.css" type="text/css" />
    <link href="themes/viewer/assets/css/basic.css" rel="stylesheet">
    <link href="themes/viewer/assets/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="themes/viewer/assets/extras/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="themes/viewer/assets/extras/modernizr.2.5.3.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="themes/viewer/assets/lib/zoom.js"></script>
    <script src="themes/viewer/assets/js/bootstrap.min.js"></script>
    <script src="themes/viewer/assets/js/rangeslider.min.js"></script>


</head>
<body>
<div class="viewer">

    <?php echo $template['body'] ?>


</div>








</body>
</html>