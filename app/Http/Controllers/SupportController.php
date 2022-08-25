<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(protected SupportRepository $support_repository)
    {
    }

    public function index(Request $request)
    {
        $supports = $this
                    ->support_repository
                    ->getSupports($request->get('status', 'P'));

        return view('admin.supports.index', [
            'supports' => convertItemsOfArrayToObject($supports)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($supports)
    {
        $support = $this->support_repository->findById($supports);

        if (!$support) {
            return redirect()->back();
        }

        return view('admin.supports.details', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
