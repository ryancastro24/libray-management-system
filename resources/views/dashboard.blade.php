@extends('layouts.app')


@section('title', 'Dashboard - Laravel Admin Panel with login and Registration')

@section('contents')

    <div class="content-wrapper">
        <div class="container">
        <div class="container-fluid p-2">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Available Books</h1>
          </div>

         
        </div>
      </div><!-- /.container-fluid -->
  

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
                    @auth
                      @if(auth()->user()->role  == 'user')
                      <th>Borrow</th>
                      @endif
                    @endauth
                  </tr>
                  </thead>
                  <tbody>
                  @auth
                  @foreach($data as $val)
                    @if($val->is_available == true)
                        <tr>
                            <td>{{$val->title}}</td>
                            <td>{{$val->author}}</td>
                            <td>{{$val->year_published}}</td>
                            <td>{{$val->category}}</td>
                            @if(auth()->user()->role == 'user')
                            <td>
                              <form action="{{ route('borrowedbooks.save') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{$val->id}}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <button class="btn btn-primary">Borrow</button>
                              </form>
                            </td>
                            @endif
                        </tr>
                      @endif
                  @endforeach
                  @endauth
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