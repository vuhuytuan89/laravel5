<!--/header-->
@include("layouts.elements.top")
<!--/slider-->
@include("layouts.elements.slide")
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include("layouts.elements.sidebar")
			</div>
			<div class="col-sm-9 padding-right">
				@yield('content')
			</div>
		</div>
	</div>
</section>
@include("layouts.elements.footer")