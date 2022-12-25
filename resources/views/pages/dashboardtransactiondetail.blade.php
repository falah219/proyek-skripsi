@extends('layouts.dashboard')

@section('title')
    Cupang - Dashboard
@endsection

@section('content')
<!--SECTION CONTENT-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                  Transaction Details
                </p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" alt="" class="w-100 mb-3">
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nama Pelanggan</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nama Produk</div>
                                <div class="product-subtitle">{{ $transaction->product->name }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Tanggal Transaksi</div>
                                <div class="product-subtitle">{{ $transaction->created_at }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Status</div>
                                <div class="product-subtitle text-danger">{{ $transaction->transaction->transaction_status }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Harga Total</div>
                                <div class="product-subtitle">Rp. {{ number_format($transaction->transaction->total_price) }}</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Nomer Handpone</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->phone_number }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                            <h5>Shipping Information</h5>
                          </div>
                          <div class="col-12">
                            <div class="row">
                              <div class="col-12">
                                <div class="product-title">Alamat</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->address }}</div>
                              </div>
                              <div class="col-12 col-md-4">
                                <div class="product-title">Provinsi</div>
                                <div class="product-subtitle">{{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}</div>
                              </div>
                              <div class="col-12 col-md-4">
                                <div class="product-title">Kota / Kabupaten</div>
                                <div class="product-subtitle">{{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}</div>
                              </div>
                              
                              <div class="col-12 col-md-4">
                                <div class="product-title">Kode Pos</div>
                                <div class="product-subtitle">{{ $transaction->transaction->user->zip_code }}</div>
                              </div>
                              <div class="col-12 col-md-4">
                                <div class="product-title">Status Pengiriman</div>
                                <div class="product-subtitle">{{ $transaction->shipping_status }}</div>
                              </div>
                              <div class="col-12 col-md-4">
                                <div class="product-title">Resi</div>
                                <div class="product-subtitle">{{ $transaction->resi}}</div>
                              </div>
                              {{-- <div class="col-12 col-md-4">
                                <div class="product-title">Status</div>
                                <select name="status" id="status" class="form-control" v-model="status">
                                  <option value="UNPAID">Unpaid</option>
                                  <option value="PENDING">Pending</option>
                                  <option value="SHIPPING">Shipping</option>
                                  <option value="SUCCESS">Success</option>
                                </select>
                              </div>
                              <template v-if="status == 'SHIPPING'">
                                <div class="col-md-3">
                                  <div class="product-title">Input Resi</div>
                                  <input type="text" name="resi" class="form-control" v-model="resi">
                                </div>
                                <div class="col-md-2">
                                  <button type="submit" class="btn btn-success btn-block mt-4">Update Resi</button>
                                </div>
                              </template> --}}
                            </div>
                          </div>
                        </div>
                        {{-- <div class="row">
                          <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success mt-4 btn-lg">Save</button>
                          </div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el :'#transactionDetails',
        data :{
          status: "SHIPPING",
          resi: "234567890282822",
        }
      })
    </script>   
@endpush