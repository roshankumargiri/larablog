@csrf
@method('PUT')
<div class="col-xs-9">
    <div class="box">

        <div class="box-body">
            <div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
                <label for="name">User Name</label>
                <input type="text" name="name" placeholder="Enter your name here" id="name" class="form-control"
                    value="{{$user->name}}">
                @if ($errors->has('name'))
                <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter your email here" name="email" id="email" class="form-control"
                    value="{{$user->email}}">
                @if ($errors->has('email'))
                <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
                <label for="password">Password</label>
                <input type="password" placeholder="password" name="password" id="password" class="form-control"
                    value="{{old('password')}}">
                @if ($errors->has('password'))
                <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>
            <div class="form-group{{$errors->has('confirm_password') ? ' has-error' : ''}}">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" placeholder="confirm password" name="confirm_password" id="confirm_password"
                    class="form-control" value="{{ old('confirm_password') }}">
                @if ($errors->has('confirm_password'))
                <span class="help-block">{{$errors->first('confirm_password')}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-left">
            <button class="btn btn-info" type="submit">Update User</button>
        </div>
    </div>
</div>
