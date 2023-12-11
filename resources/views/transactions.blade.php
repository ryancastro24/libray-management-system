@extends('layouts.app')



@section('contents')

    <div class="content-wrapper">
        <div class="container p-3">
            <h2>Transactions</h2>

            <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Number</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year Published</th>
                    <th>Date Borrowed</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($borrowedbooks as $val)
                        <tr>
                            <td>{{$val->idnumber}}</td>
                            <td>{{$val->title}}</td>
                            <td>{{$val->author}}</td>
                            <td>{{$val->category}}</td>
                            <td>{{$val->year_published}}</td>
                            <td>{{ $val->created_at->diffForHumans() }}</td>

                            <td>
                              <form action="{{ route('borrowedbooks.return') }}" method="POST">
                                @csrf
                                <input type="hidden" name="borrowedbook_book_id" value="{{$val->book_id}}">
                                <input type="hidden" name="borrowedbook_user_id" value="{{$val->user_id}}">
                                <input type="hidden" name="borrowedbook_id" value="{{$val->borrowed_book_id}}">
                                <a href="{{route('borrowedbooks.return')}}">  <button class="btn {{ $val->is_returned   ? ' disabled btn-success' : 'btn-primary' }}" {{ $val->is_returned ? 'disabled' : '' }}> {{ $val->is_returned ? 'Returned' : 'Approved' }} </button></a>
                              </form>
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


        </div>
    </div>

@endsection