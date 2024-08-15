<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\urlModel;

class MainController extends Controller
{
    private urlModel $urlModel;

    public function __construct()
    {
        $this->urlModel = new urlModel();
    }

    public function indexView(Request $request, $shortenUrl = null)
    {

        return view('home', [
            "shortenUrl" => $shortenUrl
        ]);
    }

    private function generateUrlId()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        while (strlen($randomString) < 4) {
            $randomChar = $characters[rand(0, $charactersLength - 1)];

            if (!str_contains($randomString, $randomChar)) {
                $randomString .= $randomChar;
            }

            if (strlen($randomString) == 4) {
                break;
            }
        }

        return $randomString;
    }

    public function saveUrl(Request $request)
    {

        $validationRules = [
            'long_url' => "required|url"
        ];

        $request->validate($validationRules);

        $longurl = $request->input('long_url');

        do {
            $urlId = $this->generateUrlId();
            $urlIdIsExists = $this->urlModel->where('shorten_url', $urlId)->exists();
        } while ($urlIdIsExists);

        $this->urlModel->create([
            'shorten_url' => $urlId,
            'long_url' => $longurl,
        ]);


        return $this->indexView($request, $urlId);
    }

    public function redirectUrl(Request $request, $urlId)
    {
        $urlData = $this->urlModel->where('shorten_url', $urlId)->get()->first();
        if ($urlData == null) {
            return redirect('/');
        }

        return redirect()->away($urlData->long_url);
    }
}
