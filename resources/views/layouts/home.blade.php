<!DOCTYPE html>
<html>
<head>
	<title>Page @yield('title')</title>
	<style type="text/css">
		#wapper { width: 980px; margin: auto;}
		#header { width: 100%; height: 100px; background: green}
		#main { width: 100%; height: 500px; background: red }
		#sidebar { width: 250px; height: 100%; background: #ff8000; float: left; }
		#content { width: 730px; height: 100%; background: #40ff00 ; float: left;}
		#footer { width: 100%; height: 100px; background: #ffff00}
	</style>
</head>
<body>
	<div id="wapper">
		<div id="header">header</div>
		@include('layouts.elements.menu', ['menu' => 'this is menu'])
		<div id="main">
			<div id="sidebar">sidebar</div>
			<div id="content">
				@yield('content')
			</div>
		</div>
		<div id="footer">footer</div>
	</div>
</body>
</html>