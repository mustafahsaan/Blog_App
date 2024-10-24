@php

$categorys =App\models\Category::get();
$record =App\models\Blog::latest()->take(3)->get();

@endphp
       
       
       <!-- Start Blog Post Siddebar -->
        <div class="col-lg-4 sidebar-widgets">
            <div class="widget-wrap">
              <div class="single-sidebar-widget newsletter-widget">
                <h4 class="single-sidebar-widget__title">Newsletter</h4>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route ('subscriber.store')}}" method="post">
              @csrf
                <div class="form-group mt-30">
                  <div class="col-autos">
                      <input type="text" class="form-control" name="email" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Enter email'  ">
                      @error('email')
                          <span class="text-danger">{{ $message}}</span>
                      @enderror
                      
                  </div>
                </div>
                <button type="submit" class="bbtns d-block mt-20 w-100 ">Subcribe</button>
              </form>
              </div>
              <div class="single-sidebar-widget post-category-widget">
                <h4 class="single-sidebar-widget__title">Catgory</h4>
                @foreach ($categorys as $category)
                <ul class="cat-list mt-20">
                  <li>
                    <a href="{{route('theme.cutegory',['id'=>$category->id])}}" class="d-flex justify-content-between">
                      <p>{{$category->name }}</p>
                      <p>({{count($category->blogs)}})</p>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>

              
                  @if(count($record) > 0)
                  <div class="single-sidebar-widget popular-post-widget">
                    <h4 class="single-sidebar-widget__title">Recent Post</h4>
                    <div class="popular-post-list">
                    @foreach ($record as $blog)

                    <div class="single-post-list">
                      <div class="thumb">
                        <img class="card-img rounded-0" src="{{asset("storage/blog/$blog->image")}}" alt="">
                        <ul class="thumb-info">
                          <li><a href="#">{{$blog->user->name}}</a></li>
                          <li><a href="#">{{$blog->created_at->format('d M y')}}</a></li>
                        </ul>
                      </div>
                      <div class="details mt-20">
                        <a href="{{route('blogs.show', ['blog'=>$blog])}}">
                          <h6>{{$blog->name}}</h6>
                        </a>
                      </div>
                    </div>

                    @endforeach
                  @endif
                 

                </div>
              </div>
            </div>
        </div>
        <!-- End Blog Post Siddebar -->