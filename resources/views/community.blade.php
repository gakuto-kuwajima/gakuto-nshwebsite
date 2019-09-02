@extends('layouts.front')

@section('title'){{ $page->name }}@endsection
@section('metadescription'){{ $page->information }}@endsection

@section('ogtitle'){{ $page->name }}@endsection
@section('ogurl'){{ url('/community/' . $page->permalink) }}@endsection
@section('ogimage'){{ asset('storage/image/' . $page->eyecatch_path) }}@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="community col-md-12 mx-auto">
            @if (!is_null($page->eyecatch_path))
                <div class="eyecatch text-center">
                    <img src="{{ asset('storage/image/' . $page->eyecatch_path) }}" class="img-fluid">
                </div>
            @endif
            <div class="row">
                <div class="community_name col-md-12 mx-auto">
                    <h1 class="text-center">{{ $page->name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="information col-md-12 mx-auto">
                    <h2>コミュニティ情報</h2>
                    <p>{!! nl2br(e($page->information)) !!}</p>
                </div>
            </div>
            <div class="row">
                @if (!is_null($page->image1_path))
                <div class="community_image col-md-4">
                    <img src="{{ asset('storage/image/' . $page->image1_path) }}" class="img-fluid">
                </div>
                @endif
                @if (!is_null($page->image2_path))
                <div class="community_image col-md-4">
                    <img src="{{ asset('storage/image/' . $page->image2_path) }}" class="img-fluid">
                </div>
                @endif
                @if (!is_null($page->image3_path))
                <div class="community_image col-md-4">
                    <img src="{{ asset('storage/image/' . $page->image3_path) }}" class="img-fluid">
                </div>
                @endif
                @if (!is_null($page->video1_link))
                <div class="video_link col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $page->video1_link }}" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
                @if (!is_null($page->video2_link))
                <div class="video_link col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $page->video2_link }}" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
                @if (!is_null($page->video3_link))
                <div class="video_link col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $page->video3_link }}" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
            </div>
            @if (!is_null($page->message))
            <div class="row">
                <div class="message col-md-12 mx-auto">
                    <h2>代表者メッセージ</h2>
                    <div class="balloon1">
                        @if (!is_null($page->message_image_path))
                            <div class="icon"><img src="{{ asset('storage/image/' . $page->message_image_path) }}" class="img-fluid  "></div>
                        @endif
                        <div class="balloon-text-right">
                            <p>{!! nl2br(e($page->message)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (!is_null($page->contact))
            <div class="row">
                <div class="community_contact col-md-12 mx-auto">
                    <h2>お問い合わせ</h2>
                    <div class="text">
                        <p>{!! nl2br(e($page->contact)) !!}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="facebook_link col-md-12 mx-auto">
                  <h2>各種SNSやウェブサイト</h2>
                  <p>各種SNSやウェブサイトで最新の情報を更新しています。</p>
                </div>
                <div class="row mx-auto">
                      @if (!is_null($page->facebook_link))
                      <div class="sns_btn_wrapper col">
                          <a href="{{ $page->facebook_link }}" class="sns_btn_fb"><i class="fab fa-facebook-f"></i>Facebook</a>
                      </div>
                      @endif
                      @if (!is_null($page->instagram_link))
                      <div class="sns_btn_wrapper col">
                          <a href="{{ $page->instagram_link }}" class="sns_btn_insta"><span><i class="fab fa-instagram"></i>Instagram</span></a>
                      </div>
                      @endif
                      @if (!is_null($page->twitter_link))
                      <div class="sns_btn_wrapper col">
                          <a href="{{ $page->twitter_link }}" class="sns_btn_twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                      </div>
                      @endif
                      @if (!is_null($page->website_link))
                      <div class="sns_btn_wrapper col">
                          <a href="{{ $page->website_link }}" class="sns_btn_web"><i class="fas fa-laptop"></i><span>Website</span></a>
                      </div>
                      @endif
                </div>
            </div>
            <div class="row">
               <div class="col-md-12 page-return community-page-return">
                   <button type="button" onclick="history.back()" class="btn-flat-border">戻る</button>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
