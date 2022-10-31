<script src="{{asset('semicolon/js/jquery.js')}}"></script>
<script src="{{asset('semicolon/js/plugins.min.js')}}"></script>

<!-- Footer Scripts ============================================= -->
<script src="{{asset('semicolon/js/functions.js')}}"></script>
<script src="{{asset('js/swal2.all.min.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/method.js')}}"></script>
@auth
<script>
    localStorage.setItem("route_cart", "{{route('cart.index')}}");
</script>
<script src="{{asset('js/cart.js')}}"></script>
@endauth