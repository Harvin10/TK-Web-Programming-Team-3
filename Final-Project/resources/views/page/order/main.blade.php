<x-app-layout title="Selamat Datang">
    <div id="content_list" style="background-color:#65c4eb">
        <section id="page-title">
            <div class="container clearfix">
                <h1>
                    History Transaction
                </h1>
            </div>
        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="list_result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-app-layout>