<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommunityRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Community;
use App\News;

class CommunityRepController extends Controller
{

    public function index(Request $request)
    {

        $pages = Community::all()->sortByDesc('created_at');
        $pages = Community::where('user_id', '=', Auth::id())->latest()->paginate(3);

        $newskeywords = $request->newskeywords;
        if ($newskeywords != '') {
            $newskeyary  = explode(" ",$newskeywords);
            $posts = News::where(function ($query) use ($newskeyary) {
                foreach ($newskeyary as $newsword) {
                    $query->where('news_title', 'LIKE', "%{$newsword}%")
                          ->orWhere('news_body', 'LIKE', "%{$newsword}%");
                }
            })
            ->distinct()->latest()->paginate(3);
        } else {
            $posts = News::all()->sortByDesc('created_at');
            $posts = News::where('user_id', '=', Auth::id())->latest()->paginate(3);
        }

        $nonewsresult ="お探しのキーワードでNEWSが見つかりませんでした。別のキーワードで再度お探しください。";

        return view('communityrep.index',['pages'=>$pages,  'posts'=>$posts, 'newskeywords' =>$newskeywords, 'nonewsresult'=>$nonewsresult]);
    }



    //COMMUNITY

    public function communityadd()
    {
        return view('communityrep.communitycreate');
    }


    public function communitycreate(CommunityRequest $request)
    {
        $this->validate($request, Community::$rules);

        $community =new Community;
        $form = $request->all();

        if(isset($form['eyecatch'])){
          $eyecatchpath = $request->file('eyecatch')->store('public/image');
          $community->eyecatch_path = basename($eyecatchpath);
        } else {
          $community->eyecatch_path = null;
        }

        if(isset($form['image1'])){
          $image1path = $request->file('image1')->store('public/image');
          $community->image1_path = basename($image1path);
        } else {
          $community->image1_path = null;
        }

        if(isset($form['image2'])){
          $image2path = $request->file('image2')->store('public/image');
          $community->image2_path = basename($image2path);
        } else {
          $community->image2_path = null;
        }

        if(isset($form['image3'])){
          $image3path = $request->file('image3')->store('public/image');
          $community->image3_path = basename($image3path);
        } else {
          $community->image3_path = null;
        }

        if(isset($form['message_image'])){
          $messageimagepath = $request->file('message_image')->store('public/image');
          $community->message_image_path = basename($messageimagepath);
        } else {
          $community->message_image_path = null;
        }


        unset($form['_token']);

        unset($form['eyecatch']);

        unset($form['image1']);

        unset($form['image2']);

        unset($form['image3']);

        unset($form['message_image']);


        $community->fill($form);
        $community->user_id=Auth::id();
        $community->save();


        return redirect('communityrep');
    }




    public function communityedit(Request $request)
    {
        $community = Community::find($request->id);
        if (empty($community)){
           abort(404);
        }
        return view('communityrep.communityedit', ['community_form' => $community]);
    }


    public function communityupdate(Request $request)
    {
        $this->validate($request, Community::$rules);

        $community = Community::find($request->id);

        $community_form = $request->all();
        if (isset($community_form['eyecatch'])){
          $eyecatchpath = $request->file('eyecatch')->store('public/image');
          $community->eyecatch_path = basename($eyecatchpath);
          unset($community_form['eyecatch']);
        }elseif (0 == strcmp($request->remove, 'true')){
          $community->eyecatch_path = null;
        }


        if (isset($community_form['image1'])){
          $image1path = $request->file('image1')->store('public/image');
          $community->image1_path = basename($image1path);
          unset($community_form['image1']);
        }elseif (0 == strcmp($request->remove1, 'true')){
          $community->image1_path = null;
        }


        if (isset($community_form['image2'])){
          $image2path = $request->file('image2')->store('public/image');
          $community->image2_path = basename($image2path);
          unset($community_form['image2']);
        }elseif (0 == strcmp($request->remove2, 'true')){
          $community->image2_path = null;
        }


        if (isset($community_form['image3'])){
          $image3path = $request->file('image3')->store('public/image');
          $community->image3_path = basename($image3path);
          unset($community_form['image3']);
        }elseif (0 == strcmp($request->remove3, 'true')){
          $community->image3_path = null;
        }


        if (isset($community_form['message_image'])){
          $messageimagepath = $request->file('message_image')->store('public/image');
          $community->message_image_path = basename($messageimagepath);
          unset($community_form['message_image']);
        }elseif (0 == strcmp($request->remove4, 'true')){
          $community->message_image_path = null;
        }


        unset($community_form['_token']);
        unset($community_form['remove']);
        unset($community_form['remove1']);
        unset($community_form['remove2']);
        unset($community_form['remove3']);
        unset($community_form['remove4']);

        $community->fill($community_form)->save();

        return redirect('communityrep');

    }


    public function communitydelete(Request $request){
       $community = Community::find($request->id);

       $community->delete();
       return redirect('communityrep');
    }





    //NEWS

    public function newsadd()
    {
        return view('communityrep.newscreate');
    }


    public function newscreate(NewsRequest $request)
    {
        $this->validate($request, News::$rules);

        $news =new News;
        $form = $request->all();

        if(isset($form['news_eyecatch'])){
          $newseyecatchpath = $request->file('news_eyecatch')->store('public/image');
          $news->news_eyecatch_path = basename($newseyecatchpath);
        } else {
          $news->news_eyecatch_path = null;
        }

        if(isset($form['news_image1'])){
          $newsimage1path = $request->file('news_image1')->store('public/image');
          $news->news_image1_path = basename($newsimage1path);
        } else {
          $news->news_image1_path = null;
        }

        if(isset($form['news_image2'])){
          $newsimage2path = $request->file('news_image2')->store('public/image');
          $news->news_image2_path = basename($newsimage2path);
        } else {
          $news->news_image2_path = null;
        }

        if(isset($form['news_image3'])){
          $newsimage3path = $request->file('news_image3')->store('public/image');
          $news->news_image3_path = basename($newsimage3path);
        } else {
          $news->news_image3_path = null;
        }

        unset($form['_token']);

        unset($form['news_eyecatch']);

        unset($form['news_image1']);

        unset($form['news_image2']);

        unset($form['news_image3']);


        $news->fill($form);
        $news->user_id=Auth::id();
        $news->save();


        return redirect('communityrep');
    }




    public function newsedit(Request $request)
    {
        $news = News::find($request->id);
        if (empty($news)){
           abort(404);
        }
        return view('communityrep.newsedit', ['news_form' => $news]);
    }


    public function newsupdate(Request $request)
    {
        $this->validate($request, News::$rules);

        $news = News::find($request->id);

        $news_form = $request->all();
        if (isset($news_form['news_eyecatch'])){
          $newseyecatchpath = $request->file('news_eyecatch')->store('public/image');
          $news->news_eyecatch_path = basename($newseyecatchpath);
          unset($news_form['news_eyecatch']);
        }elseif (0 == strcmp($request->newsremove1, 'true')){
          $news->news_eyecatch_path = null;
        }


        if (isset($news_form['news_image1'])){
          $newsimage1path = $request->file('news_image1')->store('public/image');
          $news->news_image1_path = basename($newsimage1path);
          unset($news_form['news_image1']);
        }elseif (0 == strcmp($request->newsremove2, 'true')){
          $news->news_image1_path = null;
        }


        if (isset($news_form['news_image2'])){
          $newsimage2path = $request->file('news_image2')->store('public/image');
          $news->news_image2_path = basename($newsimage2path);
          unset($news_form['news_image2']);
        }elseif (0 == strcmp($request->newsremove3, 'true')){
          $news->news_image2_path = null;
        }


        if (isset($news_form['news_image3'])){
          $newsimage3path = $request->file('news_image3')->store('public/image');
          $news->news_image3_path = basename($newsimage3path);
          unset($news_form['news_image3']);
        }elseif (0 == strcmp($request->newsremove4, 'true')){
          $news->news_image3_path = null;
        }

        unset($news_form['_token']);
        unset($news_form['newsremove1']);
        unset($news_form['newsremove2']);
        unset($news_form['newsremove3']);
        unset($news_form['newsremove4']);

        $news->fill($news_form)->save();

        return redirect('communityrep');

    }


    public function newsdelete(Request $request){
       $news = News::find($request->id);

       $news->delete();
       return redirect('communityrep');
    }

}
