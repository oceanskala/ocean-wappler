<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/ex/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Modal/dmxBootstrap5Modal.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <link rel="stylesheet" href="../../../dmxAppConnect/dmxBootstrap5TableGenerator/dmxBootstrap5TableGenerator.css" />
</head>

<body is="dmx-app" id="examp">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Serialno</th>
                    <th>Pdf</th>
                    <th>Img</th>
                    <th>Video</th>
                    <th>Audio</th>
                    <th>Html</th>
                    <th>Section</th>
                </tr>
            </thead>
            <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="serverconnect1.data.query" id="tableRepeat1">
                <tr>
                    <td dmx-text="id"></td>
                    <td dmx-text="serialno"></td>
                    <td dmx-text="pdf"></td>
                    <td dmx-text="img"></td>
                    <td dmx-text="video"></td>
                    <td dmx-text="audio"></td>
                    <td dmx-text="html"></td>
                    <td dmx-text="section"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/listDB.php" dmx-param:section="1"></dmx-serverconnect>



    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>