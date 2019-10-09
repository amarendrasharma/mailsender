<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
	<div class="container mb-5 py-5">
		<div class="row">
			<div class="col-md-6">
				<div class="card ">
					<div class="card-body">
						<form class="form" action="/import/excel" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="Excel">Upload Excel</label>
								<input type="file" name="excel" id="" class="mb-4">
							</div>
							<input type="submit" value="submit" name="submit" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>