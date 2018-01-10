<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use Auth;
use App\Transformers\SchoolTransformer;
use App\Http\Requests\SchoolRequest;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $school = School::find(Auth::user()->id = user_id);

        // $school = School::all();
        // return fractal()
        //         ->collection($school)
        //         ->transformWith(new SchoolTransformer)
        //         ->toArray();
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
    public function store(SchoolRequest $request, School $school)
    {
        $school = $school->create([
                'nama_sekolah' => $request->nama_sekolah,
                'user_id'      => Auth::User()->id,
                'alamat'       => $request->alamat,
                'kecamatan'    => $request->kecamatan,
                'kabupaten'    => $request->kabupaten,
                'provinsi'     => $request->provinsi,
        ]);

        $response = fractal()
                ->item($school)
                ->transformWith(new SchoolTransformer)
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
    public function update(Request $request, School $school)
    {
        $this->authorize('update', $school);
        
        $school->nama_sekolah  = $request->get('nama_sekolah', $school->nama_sekolah);
        $school->alamat        = $request->get('alamat',      $school->alamat);
        $school->alamat        = $request->get('kecamatan',   $school->kecamatan);
        $school->alamat        = $request->get('kabupaten',   $school->kabupaten);
        $school->alamat        = $request->get('provinsi',    $school->provinsi);
        $school->save();

                $response = fractal()
                ->item($school)
                ->transformWith(new SchoolTransformer)
                ->toArray();

                // return response()->json($response, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $this->authorize('destroy', $school);
        $school->delete();

         return response()->json([
            'message' => 'School deleted',
        ]);
    }
}
