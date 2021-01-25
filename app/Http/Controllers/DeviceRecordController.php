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
        return DeviceRecord::find($id)->get();
    }
}
