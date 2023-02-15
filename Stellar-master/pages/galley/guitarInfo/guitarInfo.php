<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/galley/guitarInfo/">
    <script src="../../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../../css/style.css" />
    <script src="../../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
</head>

<body is="dmx-app" id="guitarInfo" class="style16">

    <dmx-serverconnect id="serverconnect1" url="../../../../dmxConnect/api/filterDB.php" dmx-param:filter="query.serial_num"></dmx-serverconnect>
    <div is="dmx-browser" id="browser1"></div>

    <?php include '../../../partials/_navbar.html'; ?><div class="row">
        <div class="col-12">
            <!--#include file="../../../partials/_sidebar.html" -->
        </div>
        <div class="col-12">
            <a href="" dmx-bind:href="'https://devocean.skalateknoloji.net/pdf/'+serverconnect1.data.query[0].pdf"><img src="https://devocean.skalateknoloji.net/media/img-icon/pdf.jpg" alt="" srcset="" class="style19"></a>
        </div>
    </div>





    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>