@extends('layouts.app')

@section('title')
    Cupang - Product
@endsection

@section('content')
   <!-- Page Content -->

    
    <div class="page-content page-details">

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
                                <li class="breadcrumb-item active">
                                    Detail Produk
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery -->
        <section class="store-gallery mb-3" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <Transition name="slide-fade" mode="out-in">
                            <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image" alt="haloo">
                        </Transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="125">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" :class="{ active: index == activePhoto }" alt="" class="w-100 thumbnail-image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>{{ $products->name }}</h1>
                            <div class="price">Rp. {{ number_format($products->price) }}</div>
                        </div>
                        <div class="col-lg-2">
                            @auth
                                <form action="{{ route('detail-add', $products->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <button
                                    type="submit"
                                    class="btn btn-success px-4 text-white btn-block mb-3"
                                >
                                    Tambah Keranjang
                                </button>
                                </form>
                            @else
                                <a
                                href="{{ route('login') }}"
                                class="btn btn-success px-4 text-white btn-block mb-3"
                                >
                                Login dahulu
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </section>

            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            {!! $products->description !!}
                        </div>
                    </div>
                </div>
            </section>

            {{-- <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-8">
                            <h5>Customer Review (2)</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="/images/pic.png" alt="" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Cristiano Siuuuuuuu</h5>
                                        I thought it was not good for living room. I really happy
                                        to decided buy this product last week now feels like homey.
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="/images/pic.png" alt="" class="mr-3 rounded-circle">
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Cristiano Siuuuuuuu</h5>
                                        I thought it was not good for living room. I really happy
                                        to decided buy this product last week now feels like homey.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section> --}}
        </div>

    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init()
            },
            data: {
                activePhoto: 0,
                photos: [
                    @foreach ($products->galleries as $gallery)
                        {
                        id: {{ $gallery->id }},
                        url: "{{ Storage::url($gallery->photos) }}",
                        },
                    @endforeach
                ]
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                }
            }
        });
    </script>
@endpush