<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<table id="billGenerate" class="table table-bordered">
		<thead>
			<tr>
				<td colspan="4" rowspan="2"><b>Chrom plus services</b></td>
				<th>Invoice No:</th>
				<th></th>
			</tr>
			<tr>
				<th>PAN NO:</th>
				<th></th>
			</tr>
			<tr>
				<th colspan="4">To,</th>
				<th>Dated</th>
				<th></th>
			</tr>
			<tr>
				<th>Srno</th>
				<th colspan="3">Description</th>
				<th>Month</th>
				<th>Charge</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td><?php echo "a"; ?></td>
			<td colspan="3"><?php echo "b"; ?></td>
			<td><?php echo "c"; ?></td>
			<td><?php echo "d"; ?></td>
			</tr>
		</tbody>
	</table>
	<input type="button" id="btnExport" value="Download Bill" />
</div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
	$("body").on("click", "#btnExport", function () {
		html2canvas($('#billGenerate')[0], {
			onrendered: function (canvas) {
				var data = canvas.toDataURL();
				var docDefinition = {
					content: [{
						image: data,
						width: 500
					}]
				};
				pdfMake.createPdf(docDefinition).download("Bill.pdf");
			}
		});
	});
</script>
</html>