@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="menu">Tên User</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                               placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="menu">Email</label>
                        <input type="text" name="price" value="{{ $user->email }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <textarea name="description" class="form-control">{{ $user->password }}</textarea>
            </div>

            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật User</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection