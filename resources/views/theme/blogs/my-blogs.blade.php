
@extends('theme.master')
@section('title','My Blogs')


@section('content')

@include('theme.partials.hero',['titel'=> 'My Blogs'])


 <!-- ================ contact section start ================= -->
 <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          @if (session('delete-status'))
          <div class="alert alert-success">
              {{ session('delete-status') }}
          </div>
      @endif
          <table class="table">
            <thead>
              <tr>
              
                <th scope="col">Title</th>
                <th scope="col" width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @if (count($blo) > 0)
               @foreach ($blo as  $blog)
               <tr>
                
                <td>
                  <a href="{{route('blogs.show', ['blog'=>$blog])}}" target="_blank">{{$blog->name}}</a>
                </td>
                <td>
                  <a href = "{{route('blogs.edit',['blog'=> $blog])}}" class="btn btn-primary">Edit</a>
                  <form action="{{route('blogs.destroy', ['blog'=>$blog])}}" method="post" id="delet_form" class="d-inline">
                    @method('Delete')
                    @csrf
                    <a href = "javascript:$('form#delet_form').submit();" class="btn btn-danger">Delete</a>
                  </form>
                  
                </td>
              </tr>
               @endforeach   
              @endif
            </tbody>
          </table>
          @if (count($blo) > 0)
          {{ $blo->render("pagination::bootstrap-4") }}
          @endif
         
             
     

        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->

    @endsection