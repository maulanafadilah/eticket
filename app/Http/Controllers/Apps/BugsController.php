<?php

namespace App\Http\Controllers\Apps;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BugsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_title = "Bugs Report Form";
        $page_description = "Online Form for Reporting Bugs on Infomedia Application";

        return view("apps/index", compact("page_title", "page_description"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "start_date" => "nullable",
            "service" => "nullable",
            "platform" => "nullable",
            "platform_link" => "nullable",
            "channel" => "nullable",
            "detail" => "required",
            "impact" => "required",
            "ticket_id" => "nullable",
            "pic" => "required"
        ]);

        if($validatedData["start_date"] == null){
            $validatedData["start_date"] = date("Y:m:d H:i:s");
        }

        $validatedData["reference_code"] = Str::random(8); 

        $response = Http::post('10.194.2.17:3305/content', [
            "start_date" => $validatedData["start_date"],
            "service" => $validatedData["service"],
            "platform" => $validatedData["platform"],
            "platform_link" => $validatedData["platform_link"],
            "channel" => $validatedData["channel"],
            "detail" => $validatedData["detail"],
            "impact" => $validatedData["impact"],
            "ticket_id" => $validatedData["ticket_id"],
            "pic" => $validatedData["pic"],
            "type" => 1,
            "reference_code" => $validatedData["reference_code"]
        ]);

        if($response["message"] == "success"){
            return redirect("/")->with("success", $validatedData["reference_code"]);
        } else {
            return redirect("/")->with("failed", $response["sqlMessage"]);
        }
    }
}
