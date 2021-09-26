@extends('admin.master')

@section('body')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Author Page</h1>
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
                <span class="h3 card-title">Add Author</span>
                <a href="{{url('/admin-author')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <div class="card-body">
                <form action="{{url('/save-author')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Author name</label>
                            <input type="text" class="form-control" name="auth_name" placeholder="Enter Category Name">
                            @error('cat_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Author Description</label>
                            <input type="text" class="form-control" name="auth_desc" placeholder="Enter Category Description">
                            @error('cat_desc')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Author Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Enter Category Description">
                            @error('cat_desc')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Author</button>
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


