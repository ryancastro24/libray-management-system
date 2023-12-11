@extends('layouts.app')


@section('contents')

    <div class="content-wrapper">
        <div class="container p-3">
            <h2>Book Management</h2>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('books.save') }}" method="POST">

              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title">
                  </div>

                  <div class="form-group">
                    <label for="author">Author</label>
                    <input name="author" type="text" class="form-control" id="author" placeholder="Enter Author">
                  </div>

                  <div class="form-group">
                    <label for="year_published">Year Published</label>
                    <input name="year_published" type="text" class="form-control" id="year_published" placeholder="Enter Year Published">
                  </div>


                  <div class="form-group">
                    <label for="category">Category</label>
                    <input name="category" type="text" class="form-control" id="category" placeholder="Enter Category">
                  </div>

                  
               
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>


    <!-- books table -->


    <div class="content-wrapper">
        <div class="container">
        <div class="container-fluid p-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Available Books</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Published</th>
                    <th>Category</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $val)
                        <tr>
                            <td>{{$val->title}}</td>
                            <td>{{$val->author}}</td>
                            <td>{{$val->year_published}}</td>
                            <td>{{$val->category}}</td>
                            <td class="d-flex justify-content-center">
                                <button class="btn btn-primary mr-3">Update</button>
                               <a href="{{ route('books.delete', $val->id) }}"><button class="btn btn-danger">Delete</button></a> 
                            </td>
                            
                        </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
        </div>
    </div>


@endsection