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
                <span class="h3 card-title">Blogs</span>
                <a href="{{url('/add-blog')}}" class="btn btn-sm btn-primary float-right">+</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Blog Category</th>
                        <th>Blog Title</th>
{{--                        <th>Blog Long Description</th>--}}
                        <th>Author</th>
                        <th>Blog Tags</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$blog->category->cat_name}}</td>
                            <td>{{$blog->title}}</td>
{{--                            <td>{!! $blog->long_desc !!}</td>--}}
                            <td>{{$blog->author->auth_name}}</td>
                            <td>
                                @foreach($blog->blogTag as $tags)
                                    {{$tags->tag->tag_name}},
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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

