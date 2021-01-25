<?php

namespace App\Http\Controllers;

use App\Models\RecordRequest;
use App\Models\DeviceRecord;
use App\Models\RecordBloc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordRequestController extends Controller
{
    /**
     * Operation getLastRequests
     *
     * @param int $idRequest (required)
     *
     * @return Http response
     */

    public function getLastRequests($idRequest)
    {
        $recordrequests = RecordRequest::where('id', '>', $idRequest)->get();
        return $recordrequests;
    }

    /**
     * Operation getRequests
     *
     * @return Http response
     */

    public function getRequests(Request $request)
    {
        if ($request->has('device_id')) {
            $sessions = DeviceRecord::find($request->input('device_id'))->Sessions()->pluck('id');
            $recordrequests = DB::table('record_requests')->whereIn('session_id', $sessions)->get();
        }
        if ($request->has('session_id')) {
            $recordrequests = RecordRequest::where('session_id', $request->input('session_id'))->get();
        }
        if ($request->has('bloc_id')) {
            $actions = RecordBloc::find($request->input('bloc_id'))->Actions()->pluck('id');
            $recordrequests = DB::table('record_requests')->whereIn('bloc_id', $actions)->get();
        }
        if ($request->has('bloc_action_id')) {
            $recordrequests = RecordRequest::where('bloc_action_id', $request->input('bloc_action_id'))->get();
        }
        return $recordrequests;
    }

     /**
     * Operation addRequest
     *
     * @return Http response
     */

    public function addRequest(Request $request)
    {
        $input = $request->input();

        return response()->json(RecordRequest::create($input), 201);
    }

     /**
     * Operation getAllRevices
     *
     * @return Http response
     */

    public function getAllRevices(Request $request)
    {
        $input = $request->input();

        return response()->json(RecordRequest::create($input), 201);
    }
}
