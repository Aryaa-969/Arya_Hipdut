<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data ['name']               = 'David';
        $data ['dob']                = "2001-01-01";
        $data ['hobbies']            = ["Bermain Bola", "Futsal", "Voli", "Gaming", "Fotografi"];
        $data ['tgl_harus_wisuda']   = "2028-10-10";
        $data ['current_semester']   = 2;
        $data ['future_goal']        = "Menjadi Software Engineer";

        $dob = new \DateTime($data["dob"]);
        $today = new \DateTime();
        $my_age = $dob->diff($today)->y;  // Menghitung umur dalam tahun
        $data["my_age"] = $my_age;

        $tgl_harus_wisuda = new \DateTime($data["tgl_harus_wisuda"]);
        $time_to_study_left = $today->diff($tgl_harus_wisuda)->days;  // Jarak hari dalam hitungan hari
        $data["time_to_study_left"] = $time_to_study_left;

        if ($data["current_semester"] < 3) {
            $data ['message'] = "Masih Awal, Kejar TAK";
        } else {
            $data ['message'] = "Jangan main-main, kurang-kurangi main game!";
        }

        return view('mahasiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
