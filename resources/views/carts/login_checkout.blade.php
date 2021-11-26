@extends('main')

@section('content')
    <section id="form" class="bg0 p-t-150 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-1">
                    <div class="flex-w flex-t  p-t-15 p-b-30">

                        <div class="col-sm-6">
                            
                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Đăng Nhập:
                                </span>
                                <form action="{{URL::to('/login-customer')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="bor8 bg0 m-b-12 m-t-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                                        name="email_account" placeholder="Tài Khoản" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                                        name="password_account" placeholder="Mật Khẩu" required>
                                    </div>
                                        <button class="cl0 size-101 bg3 bor1 hov-btn3 pointer m-l-180">
                                            Đăng Nhập
                                        </button>
                                        <a href="register_checkout" class="m-l-150" style="color: black">Đăng Kí</a>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection