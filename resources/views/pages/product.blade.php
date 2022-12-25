@extends('layouts.app')

@section('title')
    Cupang - Homepage
@endsection

@section('content')
    <!-- Page Content-->
    <div class="page-content page-home">

      <!-- Categories -->
      <section class="store-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Kategori</h5>
            </div>
          </div>
          <div class="row">
                    @php
                        $incrementCategory = 0;
                    @endphp
                    @forelse ($categories as $category)
                        <div class="col-4 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100  }}">
                            <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100" >
                            No categories found
                        </div>
                    @endforelse
                    
                </div>
        </div>
      </section>

      <!-- Products -->
      <section class="store-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Produk</h5>
            </div>
          </div>
          @php
                        $incrementProduct =0;
                        
                    @endphp
                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" 
                                        style="
                                                @if ($product->galleries)
                                                    background-image: url(' {{ Storage::url($product->galleries->first()->photos) }} ')
                                                @else
                                                    background-color:#eee
                                                @endif
                                        ">
                                    </div>
                                </div>
                                <div class="products-text">{{ $product->name }}</div>
                                <div class="products-price">Rp. {{ $product->price }}</div>
                            </a>
                        </div>
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100" >
                            No categories found
                            </div>
                        @endforelse
                    </div>
          <div class="row">
            <div class="col-12 mt-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection