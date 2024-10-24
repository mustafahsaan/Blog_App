
@extends('theme.master')
@section('title','Register')


@section('content')

@include('theme.partials.hero',['titel'=> 'register'])


 <!-- ================ contact section start ================= -->
 <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{route ('register.post')}}" class="form-contact contact_form" action="contact_process.php" method="post" novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name"  type="text"  placeholder="Enter your name">
                  
                </div>
                <div class="form-group">
                  <input class="form-control border" name="email"  type="email"  placeholder="Enter email address">
                  
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="password"  type="password" placeholder="Enter your password">
                  
                </div>
                <div class="form-group">
                  <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                  
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
                <a href="{{route ('login')}}" class="button button--active button-contactForm">Login</a>
              <button type="submit" class="button button--active button-contactForm">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

    @endsection