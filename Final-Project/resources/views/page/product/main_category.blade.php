<x-app-layout title="Selamat Datang">
    <div id="content_list" style="background-color:#65c4eb">
        <section id="page-title" style="background-color:#65c4eb">
            <div class="container clearfix" style="background-color:#65c4eb">
                <h1>
                    Manage Product Category
                    <a href="javascript:;" onclick="load_input('{{route('products.create_cat')}}');" class="button button-border button-rounded button-red fright"><i class="icon-plus"></i>Add Category</a>
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
          <th scope="col">Slug</th>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        </tr>
      </thead>
      <tbody>
      
      @foreach ($category as $item)
        <tr>
          <td>{{$item->title}}</td>
          <td>{{$item->slug}}</td>
          <td><button type="button" class="btn btn-warning">EDIT</button></td>
          <td><button type="button" class="btn btn-danger">DELETE</button></td>
        </tr>
      @endforeach
      </tbody>
    </table>
    
</div>
</x-app-layout>