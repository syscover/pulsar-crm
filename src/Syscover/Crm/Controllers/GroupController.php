<?php namespace Syscover\Crm\Controllers;

use Illuminate\Http\Request;
use Syscover\Core\Controllers\CoreController;
use Syscover\Crm\Models\Group;

class GroupController extends CoreController
{
    protected $model = Group::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = Group::create([
            'name'  => $request->input('name')
        ]);

        $response['status'] = "success";
        $response['data']   = $action;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   \Illuminate\Http\Request  $request
     * @param   int     $id
     * @return  \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Group::where('id', $id)->update([
            'name'  => $request->input('name')
        ]);

        $action = Group::find($request->input('id'));

        $response['status'] = "success";
        $response['data']   = $action;

        return response()->json($response);
    }
}
