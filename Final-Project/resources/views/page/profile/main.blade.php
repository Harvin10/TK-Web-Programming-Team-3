<x-app-layout title="Selamat Datang">
    <div id="content_list" style="background-color:#65c4eb">
        <section id="page-title" style="background-color:#65c4eb">
            <div class="container clearfix">
                <h1>
                    PROFILE
                </h1>
            </div>
        </section>
        <section id="content">
            <div class="content-wrap">
                <div class="container">
                  <form method = "post" action="{{route('profile.edit')}}">
                  @csrf
                    <div class="form-group">
                      <label for="username">Username:</label>
                      <input type="username" class="form-control" id="username" placeholder="Enter Username" value="{{$users[0]->username}}" name="username">
                    </div>
                    <div class="form-group">
                      <label for="username">Name:</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$users[0]->name}}">
                    </div>
                    <div class="form-group">
                      <label for="username">Password:</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter Password"  name="password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
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