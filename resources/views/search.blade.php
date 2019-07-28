@extends('layouts.search')

@section('content')
    <div class="container">
        <hr class="style">
            <div class="row">
                <div class="pages col-md-10 mx-auto mt-3">
                  <h2>"{{ $keywords }}"のコミュニティ検索結果</h2>
                    <hr class="page-style">
                    @foreach($pages as $page)
                        <a href="http://127.0.0.1:8000/community/{{ $page->permalink }}" class="page-link">
                        <div class="page">
                            <div class="row no-gutters">
                                <div class="col-5 caption">
                                    <div class="image">
                                        @if ($page->eyecatch_path)
                                            <img src="{{ asset('storage/image/' . $page->eyecatch_path) }}" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-7 search-text-container">
                                <div class="search-text">
                                    <div class="page-title">
                                        @if ($page->name)
                                            <p class="name mx-auto">{{ str_limit($page->name, 100) }}</p>
                                        @endif
                                        @if ($page->pref)
                                            <p class="pref mx-auto">({{ str_limit($page->pref, 100) }})</p>
                                        @endif
                                    </div>
                                    <div class="date">
                                        {{ $page->updated_at->format('Y年m月d日') }}
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </a>
                    <hr class="post-style">
                    @endforeach
                </div>
            </div>
            <hr class="style">
                <div class="row">
                    <div class="posts col-md-10 mx-auto mt-3">
                      <h2>"{{ $keywords }}"のNEWS検索結果</h2>
                        <hr class="post-style">
                        @foreach($posts as $post)
                            <a href="http://127.0.0.1:8000/news/{{ $post->news_permalink }}" class="post-link">
                            <div class="post">
                                <div class="row no-gutters">
                                    <div class="col-5 caption">
                                        <div class="image">
                                            @if ($post->news_eyecatch_path)
                                                <img src="{{ asset('storage/image/' . $post->news_eyecatch_path) }}" class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-7 search-text-container">
                                    <div class="search-text">
                                        <div class="post-title">
                                            @if ($post->news_title)
                                                <p class="title mx-auto">{{ str_limit($post->news_title, 100) }}</p>
                                            @endif
                                        </div>
                                        <div class="date">
                                            {{ $post->updated_at->format('Y年m月d日') }}
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </a>
                        <hr class="post-style">
                        @endforeach
                    </div>
                </div>
    </div>
@endsection