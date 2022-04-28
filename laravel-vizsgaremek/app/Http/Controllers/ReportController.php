<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Product;
use App\Models\Conversation;
use App\Models\Review;
use App\Http\Requests\GetReportRequest;
use App\Http\Resources\ReportResource;

class ReportController extends Controller
{
    public function productReport($id){
        $user = auth()->user();
        $object = Product::findOrFail($id);
        return Report::create([
            "type" => "product",
            "objectId" => $object->id,
            "userId" => $user->id,
        ]);
    }

    public function conversationReport($id){
        $user = auth()->user();
        $object = Conversation::findOrFail($id);
        return Report::create([
            "type" => "conversation",
            "objectId" => $object->id,
            "userId" => $user->id,
        ]);
    }

    public function reviewReport($id){
        $user = auth()->user();
        $object = Review::findOrFail($id);
        return Report::create([
            "type" => "review",
            "objectId" => $object->id,
            "userId" => $user->id,
        ]);
    }

    public function getReports(GetReportRequest $request){
        $filters = $request->validated();
        $reports = [];
        if($filters["getBy"] == "all"){
            $reports = Report::all();  
        }
        else if($filters["getBy"] == "name"){
            $allReports = Report::all();
            $reportIds = [];
            foreach ($allReports as $report) {
                $receiver = $report->getReceiver();
                if(str_contains($receiver->name, $filters["keyword"]) || str_contains(User::find($report->userId)->name, $filters["keyword"])){
                    $reportIds[] = $report->id;
                }
            }
            $reports = Report::whereIn('id', $reportIds)->get();
        }
        else if($filters["getBy"] == "id"){
            $allReports = Report::all();
            $reportIds = [];
            foreach ($allReports as $report) {
                $receiver = $report->getReceiver();
                if(str_contains($receiver->id, $filters["keyword"]) || str_contains($report->userId, $filters["keyword"])){
                    $reportIds[] = $report->id;
                }
            }
            $reports = Report::whereIn('id', $reportIds)->get();
        }
        $reports = $reports->whereIn('type', explode(";", $filters["types"]));
        $resources = [];
        foreach ($reports as $report) {
            $resources[] = new ReportResource($report);
        }
        return $resources;
    }

    public function destroy($id){
        return Report::findOrFail($id)->delete();
    }
}
