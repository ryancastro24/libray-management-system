@extends('layouts.app')


@section('contents')

    <div class="content-wrapper">
        <div class="container p-3">
            <h2>User Management</h2>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('user.updateSave') }}" method="POST">

              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="idNumber">ID Number</label>
                    <input type="text" name="update_idnumber" value="{{ $data->idnumber }}" class="form-control  @error('idnumber')is-invalid @enderror" id="idNumber" placeholder="Enter ID Number">
                  @error('idnumber')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="fullname">FullName</label>
                    <input type="text" name="update_name" value="{{ $data->name }}" class="form-control @error('name')is-invalid @enderror" id="fullname" placeholder="Enter FullName">
                  @error('name')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="update_email" value="{{ $data->email }}" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Enter Email">
                    @error('email')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror  
                </div>

                <input type="hidden" value="{{ $data->id}}" name="id">

                 
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('usermanagement')}}"><button  type="button" class="btn btn-danger">Cancel</button></a>
                </div>

              </form>
            </div>
        </div>
    </div>





@endsection