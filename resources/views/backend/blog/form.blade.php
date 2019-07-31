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
            <div class="excerpt form-group{{$errors->has('excerpt') ? ' has-error' : ''}}">
                <label for="body">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="5" class="form-control">{{ old('excerpt') }}</textarea>
                @if ($errors->has('excerpt'))
                <span class="help-block">{{$errors->first('excerpt')}}</span>
                @endif </div>
            <div class="form-group{{$errors->has('body') ? ' has-error' : ''}}">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="10" class="form-control">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <span class="help-block">{{$errors->first('body')}}</span>
                @endif</div>







        </div>
    </div>
</div>
<div class="col-xs-3">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Publish</h3>
        </div>
        <div class="box-body">
            <div class="form-group{{$errors->has('published_at') ? ' has-error' : ''}}">
                <label for="party">Publish Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input name="published_at" value="{{ old('published_at') }}" type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                @if ($errors->has('published_at'))
                <span class="help-block">{{$errors->first('published_at')}}</span>
                @endif
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-left">
                <button class="btn btn-default" type="submit">Save Draft</button>
            </div>
            <div class="pull-right">
                <button class="btn btn-info" type="submit">Publish</button>
            </div>
        </div>
    </div>
    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title">Category</h3>
        </div>
        <div class="box-body text-center">
            <div class="form-group{{$errors->has('category_id') ? ' has-error' : ''}}">
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>

                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                <span class="help-block">{{$errors->first('category_id')}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title">Feature Image</h3>
        </div>
        <div class="box-body text-center">
            <div class="form-group{{$errors->has('image') ? ' has-error' : ''}}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://placehold.it/200x150&text=No+Image" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists img-thumbnail"
                        style="max-width: 200px; max-height: 150px;">
                    </div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select
                                image</span><span class="fileinput-exists">Change</span><input type="file"
                                name="image"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
