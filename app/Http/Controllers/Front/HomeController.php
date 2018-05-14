<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;
use Mail;
use App\ItemCatalog;
use App\ItemElement;
use App\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        /* 使用者裝置資訊 */
        $agent = new Agent();

        /* 熱門檢索詞 */
        $item_element_keywords = ItemElement::where('type', 'Keyword')->orderBy('order', 'asc')->pluck('name');

        /* 最新消息 */
        $posts = Post::orderBy('pin', 'desc')->orderBy('id', 'desc')->paginate(10);

        return view('front.home', [
            'agent' => $agent,
            'item_element_keywords' => $item_element_keywords,
            'posts' => $posts,
        ]);
    }

    public function about()
    {
        /* 熱門檢索詞 */
        $item_element_keywords = ItemElement::where('type', 'Keyword')->orderBy('order', 'asc')->pluck('name');

        return view('front.about', [
            'item_element_keywords' => $item_element_keywords,
        ]);
    }

    public function showContactForm()
    {
        /* 使用者裝置資訊 */
        $agent = new Agent();
        
        /* 熱門檢索詞 */
        $item_element_keywords = ItemElement::where('type', 'Keyword')->orderBy('order', 'asc')->pluck('name');

        return view('front.contact', [
            'agent' => $agent,
            'item_element_keywords' => $item_element_keywords,
        ]);
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'content' => 'required|max:255',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ];
    
        Mail::send('email.contact', $data, function($message) {
            $message
                ->to('admin@kuntai.epoch.tw', '廣太洋酒')
                ->subject('來自「廣太洋酒」網站的郵件')
                ->from('admin@kuntai.epoch.tw', '廣太洋酒');
        });

        return back()->with('status', '謝謝，我們已收到您的來信！');
    }
}
