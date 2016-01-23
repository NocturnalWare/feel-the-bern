<div class="row" style="@if(isset($redirected))background-color:#000;@endif color:#000">
    <center>
    	<div class="col-sm-12">
        <img style="max-height:400px;" src="http://i.imgur.com/rN9OXNb.jpg" class="img-responsive" />
        <form method="POST" action="{{route('auth.login')}}">
            {!! csrf_field() !!}

            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label class="en-label">Email</label>
                </div>
                <div class="col-sm-12">
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label class="en-label">Password</label>
                </div>
                <div class="col-sm-12">
                    <input type="password" name="password" id="password">
                </div>
            </div>

            <div class="col-sm-12">
                <input type="checkbox" name="remember"> 
                <span>Remember Me</span>
            </div>

            <div style="margin-top:20px;">
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </div>
        </form>

    </center>
</div>
