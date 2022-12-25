@extends('layouts.admin')

@section('title')
    Cupang - Dashboard
@endsection

@section('content')
    <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Galeri</h2>
                <p class="dashboard-subtitle">
                  Membuat Produk Galeri
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
                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Nama Produk</label>
                                    <select name="products_id" id="" class="form-control" required>
                                      @foreach ($products  as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                      @endforeach
                                    </select>                                       
                                  </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto Barang</label>
                                        <input type="file" name="photos" id="" class="form-control" required>
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


