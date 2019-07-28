@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
           <div class="form-group row">
              <div class="news-title col-md-12 mx-auto">
                  <h1 class="text-title">{{ $post->news_title }}</h1>
              </div>
           </div>
           <div class="form-group row">
              <div class="news_created_at">
                  <p><i class="far fa-calendar-alt"></i>{{ $post->created_at->format('Y年m月d日') }}</p>
              </div>
              @if (!is_null($post->news_writer))
              <div class="news_writer">
                  <p><i class="far fa-edit"></i>{{ $post->news_writer }}</p>
              </div>
              @endif
           </div>
           <div class="form-group row">
              <div class="news_eyecatch col-md-12 mx-auto">
                  @if (!is_null($post->news_eyecatch_path))
                      <img src="{{ asset('storage/image/' . $post->news_eyecatch_path) }}" id='news_eyecatch' class="img-fluid">
                  @endif
              </div>
           </div>
           <div class="form-group row">
              <div class="news_body col-md-12 mx-auto">
                  <p>{!! nl2br(e($post->news_body)) !!}</p>
              </div>
           </div>
           @if (!is_null($post->news_image1_path))
           <div class="form-group row">
              <div class="news_image col-md-9 mx-auto">
                  <img src="{{ asset('storage/image/' . $post->news_image1_path) }}" class="img-fluid">
              </div>
           </div>
           @endif
           @if (!is_null($post->news_image2_path))
           <div class="form-group row">
              <div class="news_image col-md-9 mx-auto" >
                  <img src="{{ asset('storage/image/' . $post->news_image2_path) }}" class="img-fluid">
              </div>
           </div>
           @endif
           @if (!is_null($post->news_image3_path))
           <div class="form-group row">
              <div class="news_image col-md-9 mx-auto">
                  <img src="{{ asset('storage/image/' . $post->news_image3_path) }}" class="img-fluid">
              </div>
           </div>
           @endif
           @if (!is_null($post->news_video1_link))
           <div class="form-group row">
              <div class="news_video_link col-md-9 mx-auto">
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $post->news_video1_link }}" allowfullscreen></iframe>
                  </div>
              </div>
           </div>
           @endif
           @if (!is_null($post->news_video2_link))
           <div class="news_video_link col-md-9 mx-auto">
              <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $post->news_video2_link }}" allowfullscreen></iframe>
              </div>
           </div>
           @endif
           @if (!is_null($post->video3_link))
           <div class="news_video_link col-md-9 mx-auto">
              <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $post->news_video3_link }}" allowfullscreen></iframe>
              </div>
           </div>
           @endif
           @if (!is_null($post->news_website_link))
           <div class="form-group row">
              <div class="news_website_link col-md-12 mx-auto">
                  <p　class="news_website_link_title">詳細ページ</p>
                  <a href="{{ $post->news_website_link }}">{{ $post->news_website_link }}</a>
              </div>
           </div>
           @endif
           <div class="form-group row">
              <div class="col-md-12 page-return">
                  <a href="http://127.0.0.1:8000/#pref-title" class="btn-flat-border">NEWS一覧へ</a>
              </div>
           </div>
        </div>
    </div>
</div>
@endsection