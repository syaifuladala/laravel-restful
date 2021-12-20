@extends('template')

@section('title', 'Halaman Login')

@section('container')

    <div class="container-fluid col-md-3">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">

                    <p class="card-text">Masuk ke Sistem</p>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>

                    <button id="btn-login" class="btn btn-sm btn-primary float-end">Login</button>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/assets/pages/login.js?v=3') }}"></script>
@endsection