<?php

namespace App\Http\Controllers\Front;

use App\Constants\DogStatus;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Comment;
use App\Models\Dog;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

        $posts = Post::skip(0)->take(2)->get();;

        $posts = Post::all();

        return view('front.index',compact('posts'));
    }

    public function getDogs() {
        $dogs = Dog::where('status', '<>', DogStatus::ADOPTED)->get();
        //$dogs = Dog::where('status', DogStatus::AVAILABLE)->get();

        return view('front.dogs',compact('dogs'));
    }
    public function getBlogs() {
        $posts = Post::get();

        return view('front.blogs',compact('posts'));
    }
    public function getCampaigns() {

        $campaigns = Campaign::get();
        return view('front.campaigns',compact('campaigns'));
    }
    public function dogDetail($id) {
        $dog = Dog::where('id',$id)->first();
        return view('front.dog_detail',compact('dog'));
    }
    public function blogDetail($id) {
        $post = Post::where('id',$id)->first();
        $comment = Comment::where('post_id',$id)->get();

        return view('front.blog_detail',compact('post','comment'));
    }

    public function campaignDetail($id) {
        $campaign = Campaign::where('id',$id)->first();
        return view('front.campaign_detail',compact('campaign'));
    }

}
