<?php

namespace App\Http\Controllers;

use App\Models\UserFavoriteDevice;
use App\Models\User;
use Illuminate\Http\Request;

class UserFavoriteDeviceController extends Controller
{
     /**
     * addFavoriteDevice
     *
     * @param int $id  (required)
     *
     * @return Http response
     */
    public function addFavoriteDevice(Request $request, $id)
    {
        $input = $request->input();

        User::find($id)->update($input);

        return response()->json(UserFavoriteDevice::create($input), 201);
    }

    /**
     * removeFavoriteDevice
     *
     * @param int $id  (required)
     *
     * @return Http response
     */
    public function removeFavoriteDevice($id)
    {
        UserFavoriteDevice::find($id)->delete();
        return response()->json('', 200);
    }
}
