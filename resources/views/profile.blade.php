@extends('layouts.dashboard_master')


<!--**********************************

            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        {{-- Cover Photo STart --}}
                        <div class="photo-content">
                            <div>


                                @if (Auth::user()->cover_photo)
                                    <img src="{{ asset('uploads/cover_photo') }}/{{ Auth::user()->cover_photo }}"
                                        class="w-100" alt="">
                                @else
                                    <img src="{{ asset('database_assests') }}/images/default_cover_photo.png"
                                        class="w-100 h-25" alt="">
                                @endif
                            </div>

                            {{-- Cover Photo End --}}

                        </div>

                        {{-- Profile Details  Start--}}

                        <div class="profile-info">
                            <div class="profile-photo">
                                @if (Auth::user()->profile_photo)
                                    <img src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}"
                                        class="img-fluid rounded-circle" alt="">
                                @else
                                    <img src="{{ asset('database_assests') }}/images/default_profile_picture.png"
                                        class="img-fluid rounded-circle" alt="">
                                @endif
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
                                    <p>UX / UI Designer</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                        aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24">
                                                </rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2">
                                                </circle>
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i>
                                            View profile</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to
                                            close friends</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to
                                            group</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                            {{-- Profile Details  End--}}

        <div class="row">

            {{-- Profile Photo Upload Start --}}

            <div class="col-lg-6">
                <form action="{{ url('profile/photo/upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Profile Photo Upload</label>
                        <input type="file" class="form-control border-black border-1"
                            placeholder="Profile Photo Upload" name="profile_photo">
                    </div>
                    <button type="submit" class="btn btn-dribbble">Change Profile Photo</button>
                    @if (session('profile'))
                        <div class="alert mt-3 alert-success text-center text-danger" role="alert">
                            {{ session('profile') }}
                        </div>
                    @endif
                </form>
            </div>

            {{-- Profile Photo Upload End --}}

            {{-- Cover Photo Upload Start --}}

            <div class="col-lg-6">
                <form action="{{ url('/cover/photo/upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Cover Photo Upload</label>
                        <input type="file" class="form-control border-black border-1"
                            placeholder="Cover Photo Upload" name="cover_photo">
                    </div>
                    <button type="submit" class="btn btn-dribbble">Change Cover Photo</button>

                    @error('cover_photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    @if (session('cover'))
                        <div class="alert mt-3 alert-success text-center text-danger" role="alert">
                            {{ session('cover') }}
                        </div>
                    @endif
                </form>
            </div>

            {{-- Cover Photo Upload End --}}

            {{-- Password Update Start --}}

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Password Changed</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="/profile/password/changed" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="old_password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Password Changed</button>
                                @if (session('status'))
                                    <div class="alert mt-3 alert-success text-center text-danger" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert mt-3 alert-info text-center text-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Password Update End --}}

            {{-- Profile Name Change Start --}}

            <div class="col-lg-4">
                <form action="{{ url('/profile/Named/changed') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name Change</label>
                        <input type="text" class="form-control border-black border-1" name="name"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <button type="submit" class="btn btn-dribbble">Name Change</button>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    @if (session('name'))
                        <div class="alert mt-3 alert-success text-center text-danger" role="alert">
                            {{ session('name') }}
                        </div>
                    @endif
                </form>
            </div>

            {{-- Profile Name Change End --}}

            {{-- Email Change Start --}}

            <div class="col-lg-6 mt-4">
                <form action="{{ url('/profile/Email/changed') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email Change</label>
                        <input type="email" class="form-control border-black border-1"
                            name="email"value="{{ Auth::user()->email }}">
                    </div>

                    <button type="submit" class="btn btn-dribbble">Email Change</button>

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    @if (session('email'))
                        <div class="alert mt-3 alert-success text-center text-danger" role="alert">
                            {{ session('email') }}
                        </div>
                    @endif

                </form>
            </div>

            {{-- Email Change End --}}



            <div class="col-lg-6 mt-4">

                {{--Phone Number Add Start --}}

                    {{-- OTP SEND MSG --}}
                        @if (session('OTP_success'))
                        <div class="alert mt-3 alert-success text-center text-success" role="alert">{{ session('OTP_success') }}
                        </div>
                        @endif
                    {{-- OTP SEND MSG --}}

                    {{-- Number ADD MSG --}}

                    @if (session('phoneNumAdded'))
                        <div class="alert alert-success text-center text-success mt-3" role="alert">{{ session('phoneNumAdded') }}</div>
                    @endif
                    {{-- Number Add MSG --}}

                    @if (Auth::user()->phone_number)

                            <h3>Your Phone Number :</h3>

                            {{-- Verify Phone Number Start --}}

                             @if ($verification_status)
                                <span><a class="btn btn-success btn-sm mb-3 mt-3" href="#">Verified</a></span>
                            @else
                                <span><a class="btn btn-danger btn-sm mb-3 mt-3" href="#">Unverify Phone Number</a></span>
                                <span><a class="btn btn-success btn-sm mb-3 mt-3" href="{{ url('/profile/phone/verify') }}">Verify Now</a></span>
                                @if (session('OTP_send'))
                                    <div class="alert mt-3 alert-primary text-center text-danger" role="alert">{{ session('OTP_send') }}</div>
                                @endif
                            @endif
                            {{-- Verify Phone Number End --}}


                            {{-- Update Phone Number Start --}}

                            @if (Auth::user()->phone_number_update_status)
                                <h4>{{ Auth::user()->phone_number }}</h4>
                                <p class="text-sm">( You Have Updated Your Phone Number Maximum Time )</p>

                            @else

                                <form action="/profile/phone/number/update" method="post">
                                    @csrf
                                        @if (session('phoneNumUpdated'))
                                            <div class="alert mt-3 alert-primary text-center text-danger" role="alert">{{ session('phoneNumUpdated') }}
                                            </div>
                                        @endif

                                        <input class="form-control text-dark" type="number" name="phone_number" value="{{ Auth::user()->phone_number }}">

                                        <button type="submit" class="btn btn-dribbble mt-3 btn-sm">Update Number</button>

                                        <span class="text-sm">(Update Your Phone Number Only 1 Time)</span>

                                </form>

                            @endif

                            {{-- Update Phone Number End --}}

                    @else

                    {{-- Adding Phone Number Start --}}

                        <form action="{{ url('/profile/phone/number/add') }}" method="post">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-bold">Add Your Mobile Number</label>

                            <input type="number" class="form-control border-black border-1" name="phone_number" placeholder="Enter Phone Number" value="{{ Auth::user()->phone_number }}">

                            @error('phone_number')
                                <div class="alert mt-3 alert-success text-center text-danger" role="alert">
                                    {{ $message }}</div>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-dribbble">Add Phone Number</button>

                        </form>

                    {{-- Adding Phone Number End --}}

                    @endif

                    {{-- OTP Setup Start --}}

                    <div class="verify">

                        @if(Auth::user()->phone_number)

                            @if(!$verification_status)
                                <form action="/profile/phone/otp/check" method="post">
                                    @csrf
                                    <input type="text" class="form-control border-black border-1 mt-3 mb-3" name="otp_verify" placeholder="Enter OTP">

                                    @if (session('OTP_Fail'))
                                        <div class="alert mt-3 alert-primary text-center text-danger" role="alert">{{ session('OTP_Fail') }}
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Verify OTP</button>


                                </form>
                            @endif

                        @endif
                    </div>

                    {{-- OTP Setup End --}}



            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->


@push('number_hide')
    <link rel="stylesheet" href="{{ asset('number css/number.css') }}">
@endpush
