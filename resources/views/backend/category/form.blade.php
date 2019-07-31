@csrf
<div class="col-xs-9">
    <div class="box">

        <div class="box-body">
            <div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Enter Title here" id="title" class="form-control"
                    value="{{ old('title') }}">
                @if ($errors->has('title'))
                <span class="help-block">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group{{$errors->has('slug') ? ' has-error' : ''}}">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                @if ($errors->has('slug'))
                <span class="help-block">{{$errors->first('slug')}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-left">
            <button class="btn btn-info" type="submit">Add Category</button>
        </div>
    </div>
</div>
