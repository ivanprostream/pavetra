<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index() {
        $messages_list = Feedback::where('lang_id', Auth::user()->country_id)->orderBy('id', 'desc')->get();
        $sidebar = '';
        return view('admin.feedback.index', compact('messages_list', 'sidebar'));
    }

    public function destroy($id)
    {
        $message = Feedback::find($id);
        $message->delete();

        return redirect('/admin/feedback')->with('message', 'Message deleted successfully!');
    }



}
