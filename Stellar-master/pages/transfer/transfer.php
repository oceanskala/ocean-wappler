<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/transfer/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Modal/dmxBootstrap5Modal.js" defer></script>
</head>

<body is="dmx-app" id="transfer" class="style16">








    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/serialnoDB.php" dmx-param:filter="query.serial_num" dmx-param:serialno="query.serial_num"></dmx-serverconnect>
    <dmx-api-action id="api1" method="post" url="http://devocean.skalateknoloji.net:3000/transferNFT/" data-type="json" dmx-header:authorization="'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNrYWxhdGVrQGdtYWlsLmNvbSIsImRhdGUiOiIyMDIzLjAyLjA2IDE3OjEwOjMzIn0.519sIJFcTBzXCRxNwx85QIqNnUqe80I8vyBeK-p54Uw'" dmx-param:serial_num="query.serial_num" noload dmx-data:from="'0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC'" dmx-data:to="text3.value" dmx-data:id="serverconnect1.data.query[0].tokenId" dmx-data:network="serverconnect1.data.query[0]._network" dmx-data:serialno="query.serial_num"></dmx-api-action>


    <div is="dmx-browser" id="browser1"></div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card col-xxl shadow">
            <div class="card">
                <div class="card-header">
                    <p>NFT</p>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card col-xxl shadow">
            <div class="card">
                <div class="card-header">
                    <p>Details</p>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>













    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>