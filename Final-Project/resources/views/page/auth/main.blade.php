<x-app-layout title="Login / Register">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">
                    <ul class="tab-nav tab-nav2 center clearfix">
                        <li class="inline-block"><a href="#tab-login">Login</a></li>
                        <li class="inline-block"><a href="#tab-register">Register</a></li>
                    </ul>
                    <div class="tab-container">
                        <div class="tab-content" id="tab-login">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="form_login" class="mb-0">
                                        <h3>Login to your Account</h3>
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="login_username">Username:</label>
                                                <input type="text" id="login_username" name="username" class="form-control" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="login_password">Password:</label>
                                                <input type="password" id="login_password" name="password" class="form-control" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <button class="button button-3d button-black m-0" onclick="handle_post('#tombol_login','#form_login','{{route('login')}}');" id="tombol_login">Login</button>
                                                {{-- <a href="#" class="float-end">Forgot Password?</a> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="tab-register">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <h3>Register for an Account</h3>
                                    <form id="form_register" class="row mb-0">
                                        <div class="col-12 form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" name="name" class="form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="register_username">Choose a Username:</label>
                                            <input type="text" id="register_username" name="username" class="form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="register_password">Choose Password:</label>
                                            <input type="password" id="register_password" name="password" class="form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <button class="button button-3d button-black m-0" onclick="handle_post('#tombol_register','#form_register','{{route('register')}}');" id="tombol_register">Register Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>