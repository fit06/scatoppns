@extends('admin.layouts.app2')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <section class="vh-100" style="background-image: url('{{ url('images/PPNS.jpg') }}'); background-size: cover; background-position: center center;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <div class="text-center">
                                <img src="{{ url($setting->logo) }}" width="80">
                                <img src="{{ url($setting->favicon) }}" width="80">
                                <h1 class="mt-5 mb-5" style="font-family: fontStatic">{{ $setting->nama_website }}</h1>
                            </div>

                            <form action="{{ route('prosesLogin') }}" method="post">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" autocomplete="off"/>
                                </div>
    
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" autocomplete="off"/>
                                </div>
    
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg d-block w-100"
                                    type="submit">Login</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
