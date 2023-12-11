@extends('layouts.app')


@section('contents')

    <div class="content-wrapper">
        <div class="container p-3">
            <h2>Returned books</h2>

                
            <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year Published</th>
                    <th>Date Returned</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($returnedbooks as $val)
                        <tr>
                            <td>{{$val->name}}</td>
                            <td>{{$val->title}}</td>
                            <td>{{$val->author}}</td>
                            <td>{{$val->category}}</td>
                            <td>{{$val->year_published}}</td>
                            <td>{{ $val->created_at->diffForHumans() }}</td>

                         
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

        </div>
    </div>

@endsection