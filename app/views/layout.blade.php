<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>City of Prince Rupert</title>
		{{ HTML::style('css/bootstrap.css') }}
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.js') }}
		{{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAwvBK0IEByg1QtaxYfBFk2fbDrvd2nCXU') }}
		
		@yield('content')
	</body>
</html>