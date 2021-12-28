@extends('layout.page')
@section('title','Author Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/regs') }}">
                        @csrf
                        <div class="col-md-12">
                            <p>kami akan mengirimkan sms kode verifikasi ke no 0{{Auth::user()->NoHP}} pastikan nomor dalam keadaan aktif</p>
                        </div>   
                       
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection