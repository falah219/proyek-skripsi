@extends('layouts.app')

@section('title')
    Cupang - Cart
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-cart">
    
        <!-- Beadcrumb -->
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="115">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('categories') }}">Kategori</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Keranjang
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cart -->
        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $totalharga = 0;
                                    $totalharga2 = 0;
                                    $diskon = 0;
                                    $transportasi = 10000;
                                    $insuransi = 3000
                                ?>
                                
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="width: 25%;">
                                            <img
                                                src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                alt=""
                                                class="cart-image"
                                            />
                                        <td style="width: 25%;">
                                            <div class="product-title">{{ $cart->product->name }}</div>
                                        </td>
                                        <td style="width: 30%;">
                                            <div class="product-title">{{number_format($cart->product->price)}}</div>
                                            <div class="product-subtitle">IRD</div>
                                        </td>
                                        <td style="width: 20%;">
                                            <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-remove-cart" type="submit">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        $totalharga += $cart->product->price
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">
                            Detail Pengiriman 
                        </h2>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" id="locations" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $cart->user->address }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="provinces_id">Provinsi</label>
                                    <select name="provinces_id" id="provinces_id" class="form-control" v-model="provinces_id" v-if="provinces">
                                        <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                    </select>
                                    <select v-else class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="regencies_id">Kota / Kabupaten</label>
                                    <select name="regencies_id" id="regencies_id" class="form-control" v-model="regencies_id" v-if="regencies">
                                        <option v-for="regency in regencies" :value="regency.id">@{{regency.name }}</option>
                                    </select>
                                    <select v-else class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="zip_code">Kode Pos</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="zip_code"
                                        name="zip_code"
                                        value="40512"
                                    />
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="mobile">Nomer Handphone</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $cart->user->phone_number }}">
                                </div>
                            </div>
                        </div>
                    
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <h2 class="mb-4">
                                Pembayaran
                            </h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        @if ($totalharga > 0)
                            <div class="col-3 col-md-2">
                                <div class="product-title">Rp. {{ number_format($transportasi) }}</div>
                                <div class="product-subtitle">Transportasi</div>
                            </div>
                            <div class="col-3 col-md-2">
                                <div class="product-title">Rp. {{ number_format($insuransi) }}</div>
                                <div class="product-subtitle">Insuransi</div>
                            </div>
                            <div class="col-3 col-md-2">
                                <div class="product-title text-danger">
                                    @if ($totalharga >= 500000 && $totalharga <= 3000000)
                                        Rp. {{ number_format($diskon = $totalharga*(20/100)  ?? 0) }}
                                    @elseif ($totalharga >3000000 && $totalharga <= 5000000)
                                        Rp. {{ number_format($diskon = $totalharga*(35/100)?? 0) }}
                                    @elseif ($totalharga >5000000)
                                        Rp. {{ number_format($diskon = $totalharga*(50/100) ?? 0) }}
                                    @endif 
                                </div>
                                <div class="product-subtitle">Diskon</div>
                            </div>
                            <div class="col-3 col-md-2">
                                <div class="product-title text-success">
                                    Rp. {{ number_format($totalharga = $totalharga - $diskon + $transportasi + $insuransi ?? 0) }}                         
                                </div>
                                <div class="product-subtitle">Total</div>
                            </div>    
                            <div class="col-12 col-md-3">
                                <a href="#">
                                    <button
                                        type="submit"
                                        class="btn btn-success mt-4 px-4 btn-block"
                                        >
                                        Checkout Sekarang
                                    </button>
                                </a>
                            </div>                        
                        @else
                            <div class="col-3 col-md-2">
                                <div class="product-title">Rp. 0</div>
                                <div class="product-subtitle">Transportasi</div>
                            </div>
                            <div class="col-3 col-md-2">
                                <div class="product-title">Rp. 0</div>
                                <div class="product-subtitle">Insuransi</div>
                            </div>    
                            <div class="col-3 col-md-2">
                                <div class="product-title text-danger">
                                    Rp 0
                                </div>
                                <div class="product-subtitle">Diskon</div>
                            </div>
                            <div class="col-3 col-md-2">
                                <div class="product-title text-success">
                                    Rp. 0                          
                                </div>
                                <div class="product-subtitle">Total</div>
                            </div>    
                            <div class="col-12 col-md-3">
                                    <a
                                        href="#x"
                                        class="btn btn-success mt-4 px-4 btn-block"
                                        >
                                        Belanja dahulu
                                    </a>
                            </div>
                        @endif
                        
                        <input type="hidden" name="total_price" value="{{ $totalharga }}">
                        <input type="hidden" name="shipping_price" value="{{ $transportasi }}">
                        <input type="hidden" name="inscurance_price" value="{{ $insuransi }}">
                        <input type="hidden" name="diskon_price" value="{{ $diskon }}">
                    </div>

                </form>
            </div>
        </section>
    
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function (response) {
                  self.provinces = response.data;
              })
          },
          getRegenciesData() {
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function (response) {
                  self.regencies = response.data;
              })
          },
        },
        watch: {
          provinces_id: function (val, oldVal) {
            this.regencies_id = null;
            this.getRegenciesData();
          },
        }
      });
    </script>
@endpush