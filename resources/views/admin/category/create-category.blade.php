@extends('admin.master')

@section('body')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>category Page</h1>
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
                <span class="h3 card-title">Add Categories</span>
                <a href="{{url('/admin-category')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <div class="card-body">
                <form action="{{url('/save-category')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category name</label>
                            <input type="text" class="form-control @error('cat_name') is-invalid @enderror" name="cat_name" placeholder="Enter Category Name">
                            @error('cat_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <input type="text" class="form-control @error('cat_desc') is-invalid @enderror" name="cat_desc" placeholder="Enter Category Description">
                            @error('cat_desc')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="">--Choose--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            @error('status')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add category</button>
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

