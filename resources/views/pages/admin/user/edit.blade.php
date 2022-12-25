@extends('layouts.admin')

@section('title')
    Cupang - Dashboard
@endsection

@section('content')
    <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Pengguna</h2>
                <p class="dashboard-subtitle">
                  Mengubah Pengguna
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input type="text" name="name" id="" class="form-control" required value="{{ $item->name }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email User</label>
                                        <input type="email" name="email" id="" class="form-control" required value="{{ $item->email }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password User</label>
                                        <input type="password" name="password" id="" class="form-control">
                                        <small>Kosongkan jika tidak ingin mengganti password</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Roles User</label>
                                        <select name="roles" id="" class="form-control" required>
                                          <option value="{{ $item->roles }}" selected>Tidak Diganti</option>
                                          <option value="ADMIN">ADMIN</option>
                                          <option value="USER">USER</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5 ">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
