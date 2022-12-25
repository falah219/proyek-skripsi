@extends('layouts.dashboard')

@section('title')
    Cupang - Dashboard
@endsection

@section('content')
   <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Daftar Transaksi</h2>
                <p class="dashboard-subtitle">
                  Lihat Riwayat-mu
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12 mt-3">
                    <h5 class="mb-3">
                      Produk yang pernah di beli
                    </h5>
                    @foreach ($buyTransaction as $transaction)
                      <a href="{{ route('dashboard-transaction-detail', $transaction->id) }}" class="card card-list d-block">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              {{ $transaction->transaction->id }}
                            </div>
                            <div class="col-md-1">
                              <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" 
                              style="max-width: 80px;" alt="">
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->product->name }}
                            </div>
                            
                            <div class="col-md-3">
                              {{ $transaction->created_at}}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->shipping_status }}
                            </div>
                            <div class="col-md-1 d-none d-md-block">
                              <img src="/images/expand_more_24px.svg" alt="">
                            </div>
                          </div>
                        </div>
                      </a>
                        
                    @endforeach
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

