@extends('layouts.app')

@section('title')
    Cupang - Homepage
@endsection

@section('content')
    <!-- Page Content-->
    <div class="page-content page-home">

      <!-- Diskon -->
      <section class="store-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Diskon yang Ditawarkan </h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mt-3">
              <div class="card-body" style="background-color:#dae4f5">
                <div class="row mt-3">
                  <div class="col-md-12">
                    <h4>Setiap Pembelian antara Rp. 500.000 dan Rp. 1.000.000</h4>
                  </div>
                  <div class="col-md-12">
                    <h1 class="text-danger">Diskon 20%</h1>
                  </div>
                  <div class="col-md-1 d-none d-md-block">
                    <img src="images/expand_more_24px.svg" alt="">
                  </div>
                </div>
              </div>
              <div class="row">
            <div class="col-12 mt-3">
              <div class="card-body" style="background-color:#dae4f5">
                <div class="row mt-3">
                  <div class="col-md-12">
                    <h4>Setiap Pembelian antara Rp. 1.000.000 dan Rp. 5.000.000</h4>
                  </div>
                  <div class="col-md-12">
                    <h1 class="text-danger">Dskon 30%</h1>
                  </div>
                  <div class="col-md-1 d-none d-md-block">
                    <img src="images/expand_more_24px.svg" alt="">
                  </div>
                </div>
              </div>
              <div class="row">
            <div class="col-12 mt-3">
              <div class="card-body" style="background-color:#dae4f5">
                <div class="row mt-3">
                  <div class="col-md-12">
                    <h4>Setiap Pembelian lebih dari Rp. 5.000.000</h4>
                  </div>
                  <div class="col-md-12">
                    <h1 class="text-danger">Diskon 50%</h1>
                  </div>
                  <div class="col-md-1 d-none d-md-block">
                    <img src="images/expand_more_24px.svg" alt="">
                  </div>
                </div>
              </div>
            </div>
        </div>
      </section>

      
    </div>
@endsection