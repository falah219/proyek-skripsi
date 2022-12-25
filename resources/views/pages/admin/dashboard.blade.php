@extends('layouts.admin')

@section('title')
    Cupang - Dashboard
@endsection

@section('content')
    <!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dasbor Admin</h2>
                <p class="dashboard-subtitle">
                  Panel Admin 
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Customer
                        </div>
                        <div class="dashboard-card-subtitle">
                          {{ $customer }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Revenue
                        </div>
                        <div class="dashboard-card-subtitle">
                          Rp. {{ number_format($revenue)  }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">
                          Transaction
                        </div>
                        <div class="dashboard-card-subtitle">
                          {{ $transaction }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="row mt-3">
                  <div class="col-12 mt-3">
                    <h5 class="mb-3">
                      Daftar transaksi
                    </h5>
                    <a href="dashboard-transactions-details.html" class="card card-list d-block">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="images/977354_720.jpg" style="max-width: 80px;" alt="">
                          </div>
                          <div class="col-md-4">
                            Cupang
                          </div>
                          <div class="col-md-3">
                            Falah YH
                          </div>
                          <div class="col-md-3">
                            10 januari, 2022
                          </div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/expand_more_24px.svg" alt="">
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="dashboard-transactions-details.html" class="card card-list d-block">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="images/977354_720.jpg" style="max-width: 80px;" alt="">
                          </div>
                          <div class="col-md-4">
                            Cupang
                          </div>
                          <div class="col-md-3">
                            Falah YH
                          </div>
                          <div class="col-md-3">
                            10 januari, 2022
                          </div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/expand_more_24px.svg" alt="">
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="dashboard-transactions-details.html" class="card card-list d-block">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="images/977354_720.jpg" style="max-width: 80px;" alt="">
                          </div>
                          <div class="col-md-4">
                            Cupang
                          </div>
                          <div class="col-md-3">
                            Falah YH
                          </div>
                          <div class="col-md-3">
                            10 januari, 2022
                          </div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/expand_more_24px.svg" alt="">
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
@endsection
