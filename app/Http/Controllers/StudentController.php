<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;
use App\Http\Requests\StudentRequest;
use App\Transformers\StudentTransformer;


class StudentController extends Controller
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
    public function store(StudentRequest $request, Student $student)
    {
        $student = $student->create([
            'user_id'    => Auth::User()->id,
            'nama_siswa' => $request->nama_siswa,
            'kelas'      => $request->kelas,

        ]);
         $response = fractal()
                ->item($student)
                ->transformWith(new StudentTransformer)
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
    public function update(Request $request, Student $student)
    {
        $this->authorize('update', $student);
        $student->nama_siswa = $request->get('nama_siswa', $student->nama_siswa);
        $student->kelas      = $request->get('kelas', $student->kelas);
        $student->save();

        return fractal()
                ->item($student)
                ->transformWith(new StudentTransformer)
                ->toArray();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();

        return response()->json([
               'massages' => 'Student Delete Succes',
            ]);       
    }
}
