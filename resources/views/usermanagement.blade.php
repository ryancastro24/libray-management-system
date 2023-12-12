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
              <form action="{{ route('register.save') }}" method="POST">

              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="idNumber">ID Number</label>
                    <input type="text" name="idnumber" class="form-control  @error('idnumber')is-invalid @enderror" id="idNumber" placeholder="Enter ID Number">
                  @error('idnumber')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="fullname">FullName</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="fullname" placeholder="Enter FullName">
                  @error('name')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Enter Email">
                    @error('email')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror  
                </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
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
            <h1>Registered Users</h1>
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
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $val)

                        <tr>
                            <td>{{$val->idnumber}}</td>
                            <td>{{$val->name}}</td>
                            <td>{{$val->email}}</td>
                            <td>{{$val->role}}</td>
                            <td class="d-flex justify-content-center">
                            <a href="{{ route('user.update', ['id' => $val->id])  }}"> <button  class="btn btn-primary mr-3">Update</button></a>
                               <a href="{{ route('user.remove', $val->id) }}"><button class="btn btn-danger">Delete</button></a> 
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