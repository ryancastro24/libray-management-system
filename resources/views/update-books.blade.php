@extends('layouts.app')


@section('contents')

    <div class="content-wrapper">
        <div class="container p-3">
            <h2>Update Book</h2>

            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('book.updateSave') }}" method="POST">

              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input name="update_title" type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ $data->title }}">
                  </div>

                  <div class="form-group">
                    <label for="author">Author</label>
                    <input name="update_author" type="text" class="form-control" id="author" placeholder="Enter Author" value="{{ $data->author }}">
                  </div>

                  <div class="form-group">
                    <label for="year_published">Year Published</label>
                    <input name="update_year_published" type="text" class="form-control" id="year_published" placeholder="Enter Year Published" value="{{ $data->year_published}}">
                  </div>


                  <div class="form-group">
                    <label for="category">Category</label>
                    <input name="update_category" type="text" class="form-control" id="category" placeholder="Enter Category" value="{{ $data->category }}">
                  </div>

                  <input type="hidden" value="{{ $data->id }}" name="id">
                  
               
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                 <a href="{{ route('booksmanagement') }}"><button type="button" class="btn btn-danger">Cancel</button></a> 
                </div>
              </form>
            </div>
        </div>
    </div>

          
        </div>
    </div>

@endsection