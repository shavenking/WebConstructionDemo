<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SSelfCheckRepository;

class SelfCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SSelfCheckRepository $sSelfCheckRepository)
    {
        $selfChecks = $sSelfCheckRepository->all();

        $selfChecks = array_map(function ($selfCheck) {
            $selfCheck['item_name'] = json_decode($selfCheck['item_name']);
            $selfCheck['item_details'] = json_decode($selfCheck['item_details']);

            return $selfCheck;
        }, $selfChecks);

        return response()->json(compact('selfChecks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(
        Request $request,
        SSelfCheckRepository $sSelfCheckRepository
    ) {
        $inputs = $request->all();

        if (isset($inputs['item_name']) && isset($inputs['item_details'])) {
            $id = $sSelfCheckRepository->create([
                'name' => $inputs['name'],
                'item_name' => json_encode($inputs['item_name']),
                'item_details' => json_encode($inputs['item_details'])
            ]);
        }

        return response()->json(compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
