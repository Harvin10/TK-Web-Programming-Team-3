<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('theme.app.head')
<body class="stretched">
	<!-- Document Wrapper ============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Header ============================================= -->
		@include('theme.app.header')
        <!-- #header end -->
		<!-- Content ============================================= -->
		{{$slot}}
        <!-- #content end -->
		<!-- Footer ============================================= -->
		@include('theme.app.footer')
        <!-- #footer end -->
	</div>
    <!-- #wrapper end -->
	<!-- Go To Top ============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	<!-- JavaScripts ============================================= -->
	@include('theme.app.js')
	@yield('custom_js')
</body>
</html>