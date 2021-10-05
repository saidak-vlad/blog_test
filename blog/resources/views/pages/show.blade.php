@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('status'))
                        {{session('status')}}
                    @endif
                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{route('post.show',$post->slug)}}"><img src="{{$post->getImage()}}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                @if($post->hasCategory())
                                    <h6>
                                        <a href="{{route('category.show', $post->category->slug)}}"> {{$post->category->title}}</a>
                                    </h6>


                                @endif


                                <h1 class="entry-title"><a
                                        href="{{route('post.show', $post->slug )}}">{{$post->title}}</a></h1>


                            </header>
                            <div class="entry-content">
                                {{$post->content}}
                            </div>
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                    <a href="{{route('tag.show', $tag->slug)}}"
                                       class="btn btn-default">{{$tag->title}}</a>
                                @endforeach
                            </div>


                        </div>
                    </article>

                    <div class="row"><!--blog next previous-->
                        <div class="col-md-6">
                            @if($post->hasPrevious())
                                <div class="single-blog-box">
                                    <a href="{{route('post.show', $post->getPrevious()->slug)}}">
                                        <img src="{{$post->getPrevious()->getImage()}}" alt="">

                                        <div class="overlay">

                                            <div class="promo-text">
                                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                <h5>{{$post->getPrevious()->title}}</h5>
                                            </div>
                                        </div>


                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($post->hasNext())
                                <div class="single-blog-box">
                                    <a href="{{route('post.show', $post->getNext()->slug)}}">
                                        <img src="{{$post->getNext()->getImage()}}" alt="">

                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-right fa fa-angle-right"></i></p>
                                                <h5>{{$post->getNext()->title}}</h5>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div><!--blog next previous end-->

                    @if(!$post->comments->isEmpty())
                        @foreach($post->getComments() as $comment)
                            <div class="bottom-comment"><!--bottom comment-->


                                <div class="comment-img">
                                    <img class="img-circle" src="{{$comment->author->getImage()}}" alt="" width="75" height="75">
                        </div>

                        <div class="comment-text">

                            <h5>{{$comment->author->name}}</h5>

                            <p class=" comment-date">
                                    {{$comment->created_at->diffForHumans()}}
                                    </p>


                                    <p class="para">{{$comment->text}}</p>
                                </div>
                            </div>
                            <!-- end bottom comment-->
                        @endforeach
                    @endif
                    @if(Auth::check())
                        <div class="leave-comment"><!--leave comment-->
                            <h4>Leave a reply</h4>


                            <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="form-group">
                                    <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Write Massage"></textarea>
                                    </div>
                                </div>
                                <button class="btn send-btn">Post comment</button>
                            </form>
                        </div><!--end leave comment-->
                    @endif
                </div>

                @include('pages.sidebar')
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection
