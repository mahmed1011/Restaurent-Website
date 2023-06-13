<div class="global-container">
    <div class="card login-form" style="
    width: 30%;
    margin-top: 11%;
    margin-left: 35%;">
        <div class="card-body">
            <h3 class="card-title text-center">Admin Login</h3>
            <div class="card-text">
                <!--
               <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                <form action="{{ route('admin.authenticate') }}" method="POST">
                    @csrf
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="submit" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                        <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"
                            name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
