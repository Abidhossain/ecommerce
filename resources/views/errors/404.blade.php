@extends('front.front-master')
@section('title','Error 404 | E-shopper')
@section('content')
    <!-- ***** Not Found Area Start ***** -->
    <section class="error_page text-center section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Not Found Text -->
                    <div class="not-found-text">
                        <h2>404</h2>
                        <h5>Oops! Page Not Found</h5>
                        <p class="text-muted">Sorry! the page you looking for is not found. Make sure that you have typed the currect URL</p>
                        <a href="{{url('/')}}" class="btn bigshop-btn"><i class="fa fa-home" aria-hidden="true"></i> GO HOME</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Not Found Area End ***** -->
@endsection