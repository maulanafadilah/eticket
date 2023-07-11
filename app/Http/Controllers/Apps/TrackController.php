<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page_title = "Track Report";
        $page_description = "Track Report of recorded Issues/Bugs";

        $result = null;
        $histories = null;

        if($request->has("search")){
            $result = Http::get("10.194.2.17:3305/content?filter=".$request->search);

            $histories = Http::get("10.194.2.17:3305/content_histories?filter=".$result[0]["id"]."&sortBy=date")->json();

            // return $histories;
        }

        return view("apps/track", compact("page_title", "page_description", "result", "histories"), ["search" => $request->search]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->update_type == 1){
            $validatedData = $request->validate([
                "date" => "required",
                "update_message" => "required",
                "content_id" => "required",
                "update_type" => "required"
            ]);
    
            $response = Http::post('10.194.2.17:3305/content_histories', [
                "update_message" => $validatedData["update_message"],
                "date" => $validatedData["date"],
                "content_id" => $validatedData["content_id"],
                "update_type" => $validatedData["update_type"]
            ]);
        } else {
            $validatedData = $request->validate([
                "resolved_time" => "required",
                "resolved_by" => "required",
                "reason" => "required",
                "content_id" => "required",
                "update_type" => "required"
            ]);

            // return $validatedData;

            $update = Http::put('10.194.2.17:3305/content/'.$validatedData["content_id"], [
                "resolved_time" => $validatedData["resolved_time"],
                "resolved_by" => $validatedData["resolved_by"],
                "reason" => $validatedData["reason"],
            ]);

            // return $update;

            if($update["message"] == "success"){
                $response = Http::post('10.194.2.17:3305/content_histories', [
                    "update_message" => $validatedData["reason"],
                    "date" => $validatedData["resolved_time"],
                    "content_id" => $validatedData["content_id"],
                    "update_type" => $validatedData["update_type"]
                ]);
            } else {
                return back()->with("failed", $update["sqlMessage"]);
            }
        }

        if($response["message"] == "success"){
            return back()->with("success", "Successfully Update Progress!");
        } else {
            return back()->with("failed", $response["sqlMessage"]);            
        }
    }
}
