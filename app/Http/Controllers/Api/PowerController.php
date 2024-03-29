<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\PowerResource;
use App\Models\Power;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PowerController extends BaseController
{
    public function index()
    {
        $powers = Power::all();

        return $this->sendResponse(PowerResource::collection($powers), 'Power retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $power = Power::create($request->all());

        return $this->sendResponse(new PowerResource($power), 'Power create successfully.');
    }

    public function update(Request $request, Power $power)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $power->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);

        return $this->sendResponse(new PowerResource($power), 'Power update successfully.');
    }

    public function destroy(Power $power)
    {
        $power->delete();

        return $this->sendResponse(new PowerResource($power), 'Power delete.');
    }
}
