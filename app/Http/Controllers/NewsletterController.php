<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class NewsletterController extends Controller
{

    public function __invoke(Newsletter $newsletter, Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe($request->email);
        } catch (Exception $exception) {


            emotify('error', 'this email could not be added to our newsletter list.');

            throw ValidationException::withMessages([
                'email' => 'this email could not be added to our newsletter list.'
            ]);
        }

        emotify('success', 'You are signed in for our newsletter');
        return redirect()->back();
    }
}
