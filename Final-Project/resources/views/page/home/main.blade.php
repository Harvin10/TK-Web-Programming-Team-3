<x-app-layout title="Selamat Datang">
    <div id="content_list" style="background-color:#65c4eb">
        <section id="page-title" style="background-color:#65c4eb">
            <div class="container clearfix" align="center" style="background-color:#65c4eb">
                <h1>NEW PRODUCT</h1>
            </div>
        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container">
                    <div id="list_result"></div>
                </div>
            </div>
        </section>
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>