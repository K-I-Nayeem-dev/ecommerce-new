@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
            <div class="card-header">Welcome</div>
            <div class="card-body">
                <h5>Your are Login</h5>
                <br>
                <h6>Your ID : {{ Auth::user()->id }}</h6>
                <br>
                <h6>Your Name : {{ Auth::user()->name }}</h6>
                <br>
                <h6>Your Email : {{ Auth::user()->email }}</h6>
                <br>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection
