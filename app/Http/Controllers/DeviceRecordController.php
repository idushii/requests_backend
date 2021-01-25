<?php

namespace App\Http\Controllers;

use App\Models\DeviceRecord;
use Illuminate\Http\Request;

class DeviceRecordController extends Controller
{
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
