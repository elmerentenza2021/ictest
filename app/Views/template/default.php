<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <!-- offline -->
    <link type="text/css" rel="stylesheet" href="/css/bootstrap@5.0.0-beta3.css" />
    <!-- ------------------------------------------------------------------------------------- -->
    
    <!-- offline -->
    <link type="text/css" rel="stylesheet" href="/css/3.3.5.bootstrap.min.css" />
    <!-- definitivo -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <!-- ------------------------------------------------------------------------------------- -->



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    
    <!-- offline -->
    <!-- <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" /> -->
    <!-- ------------------------------------------------------------------------------------- -->

    
    <link type="text/css" rel="stylesheet" href="/css/main.css" />


    <link type="text/css" rel="stylesheet" href="/css/editor.css" />
    <!-- <link href="Content/kogrid.css" rel="stylesheet">   -->
    <!-- ------------------------------------------------------------------------------------- -->
    

    <!-- offline -->
    <!-- <script src="/js/jquery-2.1.4.min.js"></script> -->
    <!-- Definitivo -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- ------------------------------------------------------------------------------------- -->


    <!-- offline -->
    <!-- <script src="/js/3.3.5.bootstrap.min.js"></script> -->
    <!-- definitivo -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- ------------------------------------------------------------------------------------- -->


    <!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js'></script> -->
    <!-- offline -->
    <script src="/js/knockout-3.5.1.js"></script>


    <!-- ------------------------------------------------------------------------------------- -->
    <script src="/js/editor.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
    <title>ISUCorp Test Project</title>
</head>
<body style="background-color: rgb(243, 243, 243);">

    <?= $this->include('template/top') ?>

    <?= $this->renderSection('main') ?>

    <?= $this->include('template/footer') ?>

</body>
</html>