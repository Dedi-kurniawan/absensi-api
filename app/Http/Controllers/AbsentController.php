<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absent;
use App\Student;
use Auth;
use App\Transformers\AbsentTransformer;
use App\Http\Requests\AbsentRequest;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(AbsentRequest $request, Absent $absent)
    {

        $absent = $absent->create([
                  'user_id'     => Auth::User()->id,
                  'student_id'  => $request->student_id,
                  'status'      => $request->status,
                  'keterangan'  => $request->keterangan,
        ]);

        $response = fractal()
                ->item($absent)
                ->transformWith(new AbsentTransformer)
                ->toArray();

                return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, Absent $absent)
    {
        $this->authorize('update', $absent);

        $absent->student_id = $request->get('student_id', $absent->student_id);
        $absent->status     = $request->get('status', $absent->status);
        $absent->keterangan = $request->get('keterangan', $absent->keterangan);
        $absent->save();

        return fractal()
                ->item($absent)
                ->transformWith(new AbsentTransformer)
                ->toArray();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absent $absent)
    {
         $this->authorize('delete', $absent);

         $absent->delete();
        return response()->json([
            'message' => 'Absent deleted',
        ]);
    }
}
