<?php
    // dang nhap vao database
    include("config.php");
    // doc input tu nguoi su dung
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $set1 = $_POST["sample"];
        $set2 = $_POST["config"];
        $set3 = $_POST["gyro"];
        $set4 = $_POST["acc"];
        $set5 = $_POST["interrupt"];
        $set6 = $_POST["power"];

        // gui du lieu xuong databse
        $sql = "insert into caidat ( sample_rate, config, gyro_config, acc_config, interrupt_enable, pwr_managment, isUpdated) values ('$set1','$set2','$set3','$set4','$set5','$set6',1)";
        mysqli_query($conn,$sql);
    }
    // doc du lieu
    $sql = "select * from caidat where STT=(select max(STT) from caidat)";
    $result = mysqli_query($conn,$sql); 
    $row = mysqli_fetch_row($result); //row[0]->stt,row[1]->hoten....
        
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>GIAM SAT MPU-6050</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div style="border:none">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="sample-rate" class="form-label fw-bold" >Sample_Rate</label>
                    <input type="text" class="form-control" name="sample" id="samp" aria-describedby="ghichu">
                </div>
                <div class="mb-3">
                    <label for="config" class="form-label fw-bold">Config</label>
                    <input type="text" class="form-control " name="config" id="config" aria-describedby="ghichu">
                </div>
                <div class="mb-3">
                    <label for="gyro-config" class="form-label fw-bold">Gyro_Config</label>
                    <select class="form-select form-select-lg mb-3 " name="gyro"aria-label=".form-select-lg example">
                        <option value="0x00">0x00</option>
                        <option value="0x08">0x08</option>
                        <option value="0x10">0x10</option>
                        <option value="0x18">0x18</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="acc-config" class="form-label fw-bold">Acc_Config</label>
                    <select class="form-select form-select-lg mb-3 " name="acc" aria-label=".form-select-lg example">
                        <option value="0x00">0x00</option>
                        <option value="0x08">0x08</option>
                        <option value="0x10">0x10</option>
                        <option value="0x18">0x18</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="interrupt" class="form-label fw-bold">Interrupt_Enable</label>
                    <input type="text" class="form-control" name="interrupt" id="interrupt" aria-describedby="ghichu">
                </div>
                <div class="mb-3">
                    <label for="power" class="form-label fw-bold">Power_Managment1</label>
                    <select class="form-select form-select-lg mb-3" name="power" aria-label=".form-select-lg example">
                        <option value="0x00">0x00</option>
                        <option value="0x01">0x01</option>
                        <option value="0x02">0x02</option>
                        <option value="0x03">0x03</option>
                        <option value="0x04">0x04</option>
                        <option value="0x05">0x05</option>
                        <option value="0x06">0x06</option>
                        <option value="0x07">0x07</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
        </div>
    <!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script><!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>
</html>