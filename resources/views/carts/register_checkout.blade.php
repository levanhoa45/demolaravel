@extends('main')

@section('content')
    <section id="form" class="bg0 p-t-150 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-1">
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="col-sm-6">
                            <form action="{{URL::to('/register_checkout')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="p-t-15  p-t-30">
                                    <span class="stext-112 cl8">
                                        Đăng Kí:
                                    </span>
    
                                    <div class="bor8 bg0 m-b-12 m-t-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                                        name="customer_name" placeholder="Họ và Tên" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-12 m-t-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                                        name="customer_email" placeholder="Email" required>
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                                        name="customer_password" placeholder="Password" required>
                                    </div>
                                    <p class="pb-1 ml-3">Ngày Sinh:</p>
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="date" 
                                        name="customer_birthday" placeholder="Ngày Sinh" required>
                                    </div>
                                    <button class="cl0 size-101 bg3 bor1 hov-btn3 pointer m-l-180">
                                        Đăng Kí
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection