<?php

namespace App\Http\Controllers;

use App\Models\DeviceRecord;
use App\Models\SessionRecord;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeviceRecordController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        error_log(json_encode($input));

        $device = DeviceRecord::firstWhere('uuid', $input['uuid']);
        if (!$device) {
            $device = new DeviceRecord($input);
            $device->device_name = $input['deviceName'];
            $device->device_version = $input['deviceVersion'];
        }
        $device->datetime_last_active = now();
        $device->save();

        $session = new SessionRecord();
        $session->device_id = $device->id;

        $session->save();

        $device->active_session_id = $session->id;
        $device->save();

        return ['session_id' => $session->id];
    }

    /**
     * getDevice
     *
     * @param id
     *
     * @return \Illuminate\Http\Response
     */
    public function getDevice($id)
    {
        $device = DeviceRecord::find($id)->get();
        $device->datetime_last_active = now();
        $device->active_session_id = $device->Requests->session_id;
        $device->save();
        return $device;
    }

    /**
     * Operation getAllRevices
     *
     * @param id
     *
     * @return Http response
     */

    public function getAllRevices($id)
    {
        return DeviceRecord::find($id)->load('Requests');
    }
}
