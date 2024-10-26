<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidatePages
{
    /**
     * Validate one-time donation request.
     */
    public function validatePagesRequest($request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'meta_description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return null;
    }
}
