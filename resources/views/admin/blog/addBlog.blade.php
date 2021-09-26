@extends('admin.master')

@section('body')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <span class="h3 card-title">Add Blogs</span>
                <a href="{{url('/admin-blog')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <div class="card-body">
                <form action="{{url('/save-blog')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category name</label>
                            <select name="cat_id" class="form-control">
                                <option value="">Select Categories</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Blog Title">
                        </div>
                        <div class="form-group">
                            <label>Blog Short Description</label>
                            <input type="text" class="form-control" name="short_desc" placeholder="Enter Short Description">
                        </div>
                        <div class="form-group">
                            <label>Blog Long Description</label>
                            <textarea name="long_desc" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Author name</label>
                            <select name="author_id" class="form-control">
                                <option value="">Select Author</option>
                                @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->auth_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tag_id[]" class="form-control" multiple>
                                <option value="">Select Tags</option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Blog Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select class="form-control" name="status">
                                <option value="">--Choose--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Blog</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection

