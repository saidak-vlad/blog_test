@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @if(session('status'))
                            {{session('status')}}
                        @endif
                        <h3 class="text-uppercase">Login</h3>

                        <br>
                        <form class="form-horizontal contact-form" role="form" method="post" action="login">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control @error('name') border border-danger @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password" placeholder="password">
                                    @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn send-btn">Login</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
                @include('pages.sidebar')
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection
