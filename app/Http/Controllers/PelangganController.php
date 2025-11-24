<?php
namespace App\Http\Controllers;

use App\Models\MultipleUploads;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns         = ['gender'];
        $searchableColumns         = ['first_name', 'last_name', 'email'];
        $pageData['dataPelanggan'] = Pelanggan::filter($request, $filterableColumns)->
            search($request, $searchableColumns)->
            paginate(10)->WithQueryString();
        return view('Admin.pelanggan.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['birthday']   = date('Y-m-d', strtotime($request->birthday));
        $data['gender']     = $request->gender;
        $data['email']      = $request->email;
        $data['phone']      = $request->phone;

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $files = MultipleUploads::where('ref_table', 'pelanggan')
            ->where('ref_id', $id)
            ->get();

        return view('Admin.pelanggan.detail', compact('pelanggan', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('Admin.pelanggan.edit', $data);
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

    public function uploadFiles(Request $request, $id)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads/pelanggan', 'public');

                MultipleUploads::create([
                    'ref_table' => 'pelanggan',
                    'ref_id'    => $id,
                    'file_path' => $path,
                ]);
            }
        }

        return back()->with('success', 'File berhasil di-upload');
    }

    public function deleteFile($id)
    {
        $file = MultipleUploads::findOrFail($id);
        Storage::disk('public')->delete($file->file_path);
        $file->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }

}
