<x-app-layout title="Selamat Datang">
    <div id="content_list" style="background-color:#65c4eb">
        <section id="page-title" style="background-color:#65c4eb">
            <div class="container clearfix" >
                <h1>
                    Manage Products
                    <a href="javascript:;" onclick="load_input('{{route('products.create')}}');" class="button button-border button-rounded button-red fright"><i class="icon-plus"></i>Add Products</a>
                </h1>
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
    <div id="content_input"></div>
    <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
          <th scope="col">IMG</th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
      
      @foreach ($collection as $item)
        <tr>
          <td>{{$item->title}}</td>
          <td>{{$item->A}}</td>
          <td>{{$item->price}}</td>
          <td><img src="{{URL::asset('uploads/'.$item->cover)}}"  width="100px"></td>
          <td><button type="button" class="btn btn-warning" onclick="load_input('{{route('products.edit',$item->id)}}');">EDIT</button></td>
          <td><button type="button" class="btn btn-danger" onclick="handle_confirm('Are you sure?','Yes','No','DELETE','{{route('products.destroy',$item->id)}}');">DELETE</button></td>
        </tr>
      @endforeach
      </tbody>
    </table>
    
</div>
</x-app-layout>