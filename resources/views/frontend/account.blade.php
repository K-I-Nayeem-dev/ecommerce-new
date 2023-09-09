@extends('layouts.frontend_master')

@section('content')
        <!-- main body - start
        ================================================== -->
        <main>

            <!-- sidebar cart - start
            ================================================== -->
            <div class="sidebar-menu-wrapper">
                <div class="cart_sidebar">
                    <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
                    <ul class="cart_items_list ul_li_block mb_30 clearfix">
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_1.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_2.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                        <li>
                            <div class="item_image">
                                <img src="assets/images/cart/cart_img_3.jpg" alt="image_not_found">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">Yellow Blouse</h4>
                                <span class="item_price">$30.00</span>
                            </div>
                            <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                        </li>
                    </ul>

                    <ul class="total_price ul_li_block mb_30 clearfix">
                        <li>
                            <span>Subtotal:</span>
                            <span>$90</span>
                        </li>
                        <li>
                            <span>Vat 5%:</span>
                            <span>$4.5</span>
                        </li>
                        <li>
                            <span>Discount 20%:</span>
                            <span>- $18.9</span>
                        </li>
                        <li>
                            <span>Total:</span>
                            <span>$75.6</span>
                        </li>
                    </ul>
                    <ul class="btns_group ul_li_block clearfix">
                        <li><a class="btn btn_primary" href="cart.html">View Cart</a></li>
                        <li><a class="btn btn_secondary" href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
                <div class="cart_overlay"></div>
            </div>
            <!-- sidebar cart - end
            ================================================== -->

            <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Login/Register</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->


            <!-- register_section - start
            ================================================== -->
            <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <ul class="nav register_tabnav ul_li_center" role="tablist">
                                <li role="presentation">
                                    <button data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="false">Seller Register</button>
                                </li>
                                <li role="presentation">
                                    <button data-bs-toggle="tab" class="active" data-bs-target="#signup_tab" type="button" role="tab" aria-controls="signup_tab" aria-selected="true">Customer Register</button>
                                </li>
                            </ul>

                            <div class="register_wrap tab-content">
                                <div>
                                    @if (session('seller_reg_success'))
                                        <h6 class="alert alert-success text-center">{{ session('seller_reg_success') }}</h6>
                                    @endif
                                </div>
                                <div class="tab-pane fade " id="signin_tab" role="tabpanel">
                                    <form action="{{ route('sellerreg') }}" method="POST">

                                        @csrf

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">User Name <sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                                <input id="username_input2" type="text" name="name" placeholder="User Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                                <input id="email_input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input id="password_input2" type="password" name="password" placeholder="Password">
                                                @error('password')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Confirm Password<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input id="password_input2" type="password" name="confirm_password" placeholder="Confirm Password">
                                                @error('confirm_password')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Phone<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-phone"></i></label>
                                                <input id="password_input2" type="tel" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <div class="form_item">
                                                {!! NoCaptcha::display() !!}
                                                @error('g-recaptcha-response')
                                                <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_secondary">Register</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade show active" id="signup_tab" role="tabpanel">
                                    <div>
                                        @if (session('customer_reg_success'))
                                            <h6 class="alert alert-success text-center">{{ session('customer_reg_success') }}</h6>
                                        @endif
                                    </div>

                                    <form action="{{ route('customerreg') }}" method="POST">

                                        @csrf

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">User Name <sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                                <input id="username_input2" type="text" name="name" placeholder="User Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                                <input id="email_input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input id="password_input2" type="password" name="password" placeholder="Password">
                                                @error('password')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Confirm Password<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input id="password_input2" type="password" name="confirm_password" placeholder="Confirm Password">
                                                @error('confirm_password')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Phone<sup class="text-danger">*</sup></h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-phone"></i></label>
                                                <input id="password_input2" type="tel" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form_item_wrap">
                                            <div class="form_item">
                                                {!! NoCaptcha::display() !!}
                                                @error('g-recaptcha-response')
                                                <div class="alert alert-danger my-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_secondary">Register</button>
                                        </div>



                                    </form>
                                </div>

                                <div class="form_item_wrap mt-3">
                                    <p class="fs-6">Already Have An Account <span><a href="{{ route('accountlogin') }}" class="text-danger fw-bold">Login</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register_section - end
            ================================================== -->


        </main>
        <!-- main body - end
        ================================================== -->
@endsection
