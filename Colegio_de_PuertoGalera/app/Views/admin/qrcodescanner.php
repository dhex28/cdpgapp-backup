<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin - QR Code Scanner</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon/colegiologo.png">
	<link rel="stylesheet" href="assets1/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets1/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets1/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets1/css/feathericon.min.css">
	<link rel="stylesheet" href="assets1/plugins/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="assets1/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets1/css/style.css"> 
</head>

<body>
	<!-- topbar -->
	<?= $this->include('include/topbar.php') ?>

	<!-- sidebar -->
	<?= $this->include('include/sidebar.php') ?>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h2 class="card-title float-left mt-2"> Scan QR Code for Entrance Exam</h2>
                        </div>
                    </div>
                </div>
            </div>
           
			<!-- QR Code Scanner Section -->
			<div class="row">
				<div class="col-sm-12">
					<div class="card card-table">
						<div class="card-body text-center">
							<h5 class="mb-4">Please align the QR code within the frame to scan</h5>

							<!-- Camera QR Code Scanner -->
							<div id="qr-reader" style="width: 500px; margin: 0 auto;"></div>
							<div id="qr-reader-results" class="mt-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>

	<script>
		function onScanSuccess(decodedText, decodedResult) {
			// Handle the scanned QR code
			fetch(`/admin/scanQRCode/${decodedText}`, {
				method: 'POST',
			})
			.then(response => response.json())
			.then(data => {
				// Display success or error message
				alert(data.message);
				// Optionally, reload the page to reset scanner and status
				if (data.success) {
					document.getElementById('qr-reader-results').innerHTML = `<div class="alert alert-success">${data.message}</div>`;
				} else {
					document.getElementById('qr-reader-results').innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
				}
			})
			.catch(error => {
				console.error("Error scanning QR code:", error);
				alert("An error occurred while processing the QR code.");
			});
		}

		function onScanFailure(error) {
			// handle scan failure, usually better to just ignore or log it
			console.warn(`QR Code scan error: ${error}`);
		}

		let html5QrcodeScanner = new Html5QrcodeScanner(
			"qr-reader", { fps: 10, qrbox: 250 }
		);
		html5QrcodeScanner.render(onScanSuccess, onScanFailure);
	</script>

	<script src="assets1/js/jquery-3.5.1.min.js"></script>
	<script src="assets1/js/popper.min.js"></script>
	<script src="assets1/js/bootstrap.min.js"></script>
	<script src="assets1/js/moment.min.js"></script>
	<script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets1/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets1/js/script.js"></script>
</body>

</html>
