<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\WinnerHall;
use App\Models\Contest;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class HomeController extends Controller
{
    /**
     * Customer info page
     */
    public function index() {
        $banners = HomeBanner::orderBy('order', 'asc')->get();
        $hall = WinnerHall::orderBy('order', 'asc')->get();
        $nextContest = Contest::active()->next()->first();
        return view('home', compact('banners', 'hall', 'nextContest'));
    }

    public function sendContact(ContactRequest $request)
    {
        $emailTo = env('MAIL_TO_CONTACT_US', false);
        if ($emailTo) {
            $data = $request->all();
            Mail::to($emailTo)->send(new ContactUs([
                'name' => $data['name'],
                'email' => $data['email'],
                'msg' => $data['message'],
            ]));
        }

        \Session::flash('message', "Tus datos han sido enviados correctamente.");
        return \Redirect::back();
    }
}
