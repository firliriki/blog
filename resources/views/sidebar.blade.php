<div style="margin-left: 30%">
<div class="box-border h-200 w-100 p-4 border-4 bg-gradient-to-b from-yellow-400 to-red-500 flow-root">
<h2 class="mb-4 text-2xl antialiased sm:subpixel-antialiased md:antialiased text-white">
    Recent Comments
   </h2>
   @foreach($comment as $comm)
   <div class="row">
     <div class="col-sm-12">
       <div class="border-bottom">
         <div class="row">
           <div class="col-sm-8">
             <h5 class="font-weight-600 mb-1">
                 {{ $comm->comment_content }}
             </h5>
             {{-- <a href="{{ url('single/'.$posts->post_slug) }}">View</a> --}}
             <p class="fs-13 text-muted mb-0">
               <span class="mr-2">By: {{ $comm->comment_author }} </span>{{ \Carbon\Carbon::parse($comm->updated_at)->diffForHumans() }} on <a class="hover:text-yellow-500" href="{{ url('single/'.$comm->post_slug) }}">{{ $comm->post_title }}</a>
             </p>
           </div>
         </div>
       </div>
     </div>
   </div>
 @endforeach
</div>
<div class="box-border h-160 w-100 p-4 border-4 bg-gradient-to-b from-white to-green-300 flow-root">
 <h2 class="mb-4 text-2xl">
  Random Posts!
 </h2>
 @foreach($posts as $post)
 <div class="row">
   <div class="col-sm-12">
     <div class="border-bottom pt-1">
      <div class="row">
        <div class="col-sm-8">
          <h5 class="font-weight-600 mb-1">
              {{ $post->post_title }}
          </h5>
          {{-- <a href="{{ url('single/'.$posts->post_slug) }}">View</a> --}}
          <p class="fs-13 text-muted mb-0">
            <span class="mr-2 ">By: {{ $post->post_author }} </span>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }} <a class="hover:text-yellow-500" href="{{ url('single/'.$post->post_slug) }}">Check it Out!</a>
          </p>
        </div>
      </div>
     </div>
   </div>
 </div>
@endforeach
</div>
</div>
