<section id="page-title">
    <div class="container clearfix">
        <h1>
            <a href="javascript:;" onclick="load_list(1);" class="button button-border button-rounded button-red fright"><i class="icon-undo"></i>Back</a>
        </h1>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <form id="form_input" method="POST"action="{{route('products_cat.store')}}">
            @csrf
                <div class="row">
                    <div class="w-100"></div>
                    <div class="col-md-6 form-group">
                        <label for="developer">Tittle<small>*</small></label>
                        <input type="text" id="developer" name="tittle" class="sm-form-control required" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="publisher">Slug<small>*</small></label>
                        <input type="text" id="publisher" name="slug" class="sm-form-control required" />
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12 form-group">
                        <button class="button button-3d m-0" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    number_only('price');
    ribuan('price')
</script>