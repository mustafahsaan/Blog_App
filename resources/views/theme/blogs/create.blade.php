
@extends('theme.master')
@section('title','Add New Blog')


@section('content')

@include('theme.partials.hero',['titel'=> 'Add New Blog'])


 <!-- ================ contact section start ================= -->
 <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          @if (session('image-status'))
          <div class="alert alert-success">
              {{ session('image-status') }}
          </div>
      @endif
          <form action="{{route ('blogs.store')}}" class="form-contact contact_form"  method="post" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
           
            
                <div class="form-group">
                  <input class="form-control border" name="name"  type="text"  placeholder="Enter your name">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                  
                </div>
               
                <div class="form-group">
                    <select class="form-control border" name="category_id" placeholder="Enter your category" >
                        <option value="">Select Category</option>
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                       
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
          
                <div class="form-group">
                  <input class="form-control border" name="image"  type="file" placeholder="Enter your Image">
                  @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                   
                    <textarea class="w-100 border" name="description"   rows="5"></textarea>
                  </div>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Add New</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

    @endsection