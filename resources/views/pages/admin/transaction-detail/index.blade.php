@extends('layouts.admin')

@section('title')
    Cupang - Dashboard
@endsection

@section('content')
    <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaksi Detail</h2>
                <p class="dashboard-subtitle">
                  Daftar Transaksi Detail
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>ID Transaksi</th>
                                <th>Nama Pembeli</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Status Pengiriman</th>
                                <th>Resi</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>                          
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script>
      var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url:'{!! url()->current() !!}',
        },
        columns:[
          { data: 'id', name: 'id' },
          { data: 'transactions_id', name: 'transactions_id' },
          { data: 'transaction.user.name', name: 'transaction.user.name' },
          { data: 'product.name', name: 'product.name' },
          { data: 'price', name: 'price' },
          { data: 'shipping_status', name: 'shipping_status' },
          { data: 'resi', name: 'resi' },
          { data: 'created_at', name: 'created_at' },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '15%',
          },
        ]
      });
    </script>
@endpush
