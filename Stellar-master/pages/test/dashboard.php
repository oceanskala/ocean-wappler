<!doctype html>
<html>

<head>
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <base href="/Stellar-master/pages/test/">
    <meta charset="UTF-8">
    <title>Untitled Document</title>

</head>

<body is="dmx-app" id="dashboard">
    <?php
    
    require 'db.php'; 
        $netwrk = $db->prepare('SELECT * FROM smartContracts WHERE activated=?');
        $netwrk->execute([1]);
        $netwrkcek = $netwrk->fetch(PDO::FETCH_ASSOC);

        $guitarsor = $db->prepare('SELECT * FROM pdf');
        $guitarsor->execute();
        $guitarcek = $guitarsor->fetchAll(PDO::FETCH_ASSOC);


        $current_network = $netwrkcek["networkk"];
        $symbl = $netwrkcek["symbol"];
        $symblArr = ["BNB", "ETH", "MATIC", "AVAX", "TRX", "SOL"];

        $nftcek = array();
        $n = 0;
        foreach ($guitarcek as $tt) {
        if ($current_network == "All Networks") {
            if ($guitarcek[$n]["hasNft"] != 0) {
            array_push($nftcek, $guitarcek[$n]);
            }
        } elseif ($guitarcek[$n]["hasNft"] != 0 && $guitarcek[$n]["_network"] == $current_network) {
            // echo "<br>";
            // print_r($guitarcek[$i]);
            array_push($nftcek, $guitarcek[$n]);
        }
        $n++;
        }

        $Arrguitar = [];
        $nftArr = [];

        $totalExpanse = 0;
        $totalExpanseArr = array();
        $totalExpanseUSD = 0;

        $i = 0;
        $p = 0;
        $k = 0;
        $s = 0;
        $year = date("Y");
        $daysmonth = [];
        $date_time_end;
        $date_time_start;
        $datetime;
        $url;

        if ($nftcek) {
        foreach ($nftcek as $nf) {
            $datetime = $nftcek[$s]["NFTtimedate"];
            $totalExpanse += $nftcek[$i]["fee"];
            $i++;
            for ($r = 0; $r <= $year - 2022; $r++) {
            if ($r % 4 == 0) {
                $daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            } else {
                $daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            }
            for ($o = 1; $o <= count($daysmonth); $o++) {
                for ($k = 1; $k <= $daysmonth[$o - 1]; $k++) {
                $r2 = sprintf('%04d', $r + 2022);
                $o2 = sprintf('%02d', $o);
                $k2 = sprintf('%02d', $k);
                $date_time_end = date("$r2-$o2-$k2 23:59:59");
                $date_time_start = date("$r2-$o2-$k2 00:00:00");

                if ($date_time_start < $datetime && $datetime < $date_time_end) {
                    $nftArr[$r][$o - 1][$k - 1] += 1;
                } else {
                    $nftArr[$r][$o - 1][$k - 1] += 0;
                }
                }
            }
            }
            $s++;
        }
        } else {
        foreach ($guitarcek as $nf) {
            $datetime = $nftcek[$s]["NFTtimedate"];
            $totalExpanse += $nftcek[$i]["fee"];
            $i++;
            for ($r = 0; $r <= $year - 2022; $r++) {
            if ($r % 4 == 0) {
                $daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            } else {
                $daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            }
            for ($o = 1; $o <= count($daysmonth); $o++) {
                for ($k = 1; $k <= $daysmonth[$o - 1]; $k++) {

                $nftArr[$r][$o - 1][$k - 1] = 0;

                }
            }
            }
            $s++;
        }
        }
        foreach ($guitarcek as $nf) {
        $datetime = $guitarcek[$p]["timedate"];
        for ($r = 0; $r <= $year - 2022; $r++) {
            if ($r % 4 == 0) {
            $daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            } else {
            $daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            }
            for ($o = 1; $o <= count($daysmonth); $o++) {
            for ($j = 1; $j <= $daysmonth[$o - 1]; $j++) {
                $r2 = sprintf('%04d', $r + 2022);
                $o2 = sprintf('%02d', $o);
                $j2 = sprintf('%02d', $j);
                $date_time_end = date("$r2-$o2-$j2 23:59:59");
                $date_time_start = date("$r2-$o2-$j2 00:00:00");

                if ($date_time_start < $datetime && $datetime < $date_time_end) {
                $Arrguitar[$r][$o - 1][$j - 1] += 1;
                } else {
                $Arrguitar[$r][$o - 1][$j - 1] += 0;
                }
            }
            }
        }
        $p++;
        }

        if ($current_network == "Binance" || $current_network == "BNB(Testnet)") {

        $USDprice = json_decode(convertToUSD("BNB", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;


        } elseif ($current_network == "Ethereum" || $current_network == "Ethereum(Ropsten)") {

        $USDprice = json_decode(convertToUSD("ETH", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "Polygon" || $current_network == "Polygon(Mumbai)") {

        $USDprice = json_decode(convertToUSD("MATIC", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "AVAX" || $current_network == "Fuji(Testnet)") {

        $USDprice = json_decode(convertToUSD("AVAX", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "Tron" || $current_network == "Shasta(Testnet)") {

        $USDprice = json_decode(convertToUSD("TRX", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "All Networks") {
        for ($t = 0; $t < count($guitarcek); $t++) {
            $net = $guitarcek[$t]["_network"];
            $totalExpanse2 = $guitarcek[$t]["fee"];

            switch ($net) {
            case "BNB(Testnet)":

                $USDprice = json_decode(convertToUSD("BNB", "USd"))->USD;
                $totalExpanseArr[0] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Ethereum(Ropsten)":
                $USDprice = json_decode(convertToUSD("ETH", "USd"))->USD;
                $totalExpanseArr[1] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Polygon(Mumbai)":
                $USDprice = json_decode(convertToUSD("MATIC", "USd"))->USD;
                $totalExpanseArr[2] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Fuji(Testnet)":
                $USDprice = json_decode(convertToUSD("AVAX", "USd"))->USD;
                $totalExpanseArr[3] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Shasta(Testnet)":
                $USDprice = json_decode(convertToUSD("TRX", "USd"))->USD;
                $totalExpanseArr[4] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            default:
                $totalExpanseUSD += 0;
                break;
            }


        }
        }


        function convertToUSD($coin, $fiatMoney)
        {

        $url = "https://min-api.cryptocompare.com/data/price?fsym=$coin&tsyms=$fiatMoney";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return ($resp);

        }
echo json_encode($Arrguitar);


?>

    <button type="hidden" id="guitarArr" value="<?php echo json_encode($Arrguitar) ?>" hidden></button>
    <button type="hidden" id="nftArr" value="<?php echo json_encode($nftArr) ?>" hidden></button>
    <button type="hidden" id="guitarCount" value="<?php echo count($guitarcek) ?>" hidden></button>
    <button type="hidden" id="nftCount" value="<?php echo count($nftcek) ?>" hidden></button>

    <div class="col-12 col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-header">
                <span id="chart1head" style="margin-right: 30%;"></span>
                <button style="width: 6%; margin-right: 2%; text-align: center; border-radius: 5px; border: none;" id="backward"><i class="fa-solid fa-caret-left"></i></button>
                <button style="width: 6%; text-align: center; border-radius: 5px; border: none;" id="forward"><i class="fa-solid fa-caret-right"></i></button>


            </div>
            <div class="card-body">
                <ul class="list-inline">
                    <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>All Items</li>
                    <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Guitar Created</li>
                    <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>NFT Created</li>
                </ul>
                <div class="chart-container-1">
                    <canvas id="chartt" style="height: 100%; width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var currentdate = new Date();
        var datetime = currentdate.getFullYear() + "-"
          + (currentdate.getMonth() + 1) + "-"
          + currentdate.getDate() + " " +
          + currentdate.getHours() + ":"
          + currentdate.getMinutes() + ":"
          + currentdate.getSeconds();

        let year = currentdate.getFullYear() - 2022;
        let nthMonth = currentdate.getMonth() + 1;
        let daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let xValues = [];
        let guitarCount = $("#guitarCount").val();
        let nftCount = $("#nftCount").val();

        if (currentdate.getFullYear() % 4 == 0) {
          daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
        }

        function chartData() {
          xValues = [];
          for (i = 0; i < daysmonth[nthMonth - 1]; i++) {
            xValues[i] = i + 1;
          }
          // console.log(xValues);

          //gitar sayıları
          let a = $("#guitarArr").val();
          const guitarArr = JSON.parse(a);
          // nft sayıları
          let t = $("#nftArr").val();

          const nftArr = JSON.parse(t);

          console.log(nftArr);

          let title = months[nthMonth - 1] + " " + (year + 2022);
          $("#chart1head").html(title);

          new Chart("chartt", {
            type: "line",
            data: {
              labels: xValues,
              datasets: [{
                data: guitarArr[year][nthMonth - 1],
                borderColor: "white",
                pointRadius: 0,
                backgroundColor: "rgba(255,255,255,0.5)",
                fill: true
              }, {
                data: nftArr[year][nthMonth - 1],
                borderColor: "rgba(22,12,32)",
                pointRadius: 0,
                backgroundColor: "rgba(22,12,32,0.5)",
                fill: true
              }]
            },
            options: {
              legend: { display: false },
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  },
                }]
              },
            }
          });
        }

        $("#backward").click(function () {
          if (nthMonth == 1) {
            if (year == 0) {
              chartData();
            } else {
              nthMonth = 12;
              year = year - 1;
              chartData();
            }

          } else {
            nthMonth = nthMonth - 1;
            chartData();
          }

        });
        $("#forward").click(function () {
          if (nthMonth == 12) {
            if ((year + 2022) == currentdate.getFullYear()) {
              chartData();
            } else {
              year = year + 1;
              nthMonth = 1;
              chartData();

            }
          } else {
            nthMonth = nthMonth + 1;
            chartData();
          }
        });

        chartData();


        var ctx = document.getElementById("chartt2").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["Guitar", "NFT"],
            datasets: [{
              backgroundColor: [
                "#ffffff",
                "rgba(255, 255, 255, 0.71)"
              ],
              data: [guitarCount, nftCount],
              borderWidth: [0, 0]
            }]
          },
          options: {
            legend: {
              position: "right",
              display: true,
              labels: {
                fontColor: '#ddd',
                boxWidth: 15
              }
            }
          }
        });

</script>