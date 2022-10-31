<section id="page-title">
    <div class="container clearfix">
        <h1>
            {{$data->id ? 'Update' : 'Add'}} Product
            <a href="javascript:;" onclick="load_list(1);" class="button button-border button-rounded button-red fright"><i class="icon-undo"></i>Back</a>
        </h1>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <form id="form_input" method="POST"action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="title">Category <small>*</small></label>
                        <select class="form-control" id="category" name="category">
                            <option value="" selected disabled>Choose Category</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}" {{$data->product_category_id == $item->id ? 'selected' : ''}}>{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="title">Title <small>*</small></label>
                        <input type="text" id="title" name="title" class="sm-form-control required" value="{{$data->title}}" />
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="price">Price <small>*</small></label>
                        <input type="text" id="price" name="price" maxlength="20" class="sm-form-control required" value="{{number_format($data->price)}}" />
                    </div>
                    <div class="w-100"></div>
                    <div class="w-100"></div>
                    <div class="col-12 form-group">
                        <label for="template-contactform-message">Description <small>*</small></label>
                        <textarea class="required sm-form-control" id="description" name="description" rows="6" cols="30">{{$data->desc}}</textarea>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12 form-group">
                        <label for="cover">IMG <small>*</small></label>
                        <input type="file" id="cover" name="cover" class="sm-form-control required" />
                    </div>
                    <div class="col-12 form-group">
                        @if ($data->id)
                        <button class="button button-3d m-0" onclick="handle_upload('#tombol_simpan','#form_input','{{route('products.update',$data->id)}}','PATCH');" id="tombol_simpan">Save</button>
                        @else
                        <button class="button button-3d m-0" type="submit" id="tombol_simpan">Save</button>
                        @endif
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