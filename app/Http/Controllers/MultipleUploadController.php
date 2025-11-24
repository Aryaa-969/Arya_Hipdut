<?php
namespace App\Http\Controllers;

use App\Models\MultipleUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultipleUploadController extends Controller
{
    // Menyimpan upload
    public function store(Request $request)
    {
        $request->validate([
            'files.*'   => 'required|file|max:2048',
            'ref_table' => 'required',
            'ref_id'    => 'required|integer',
        ]);

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {
                $path = $file->store('multiple_uploads');

                MultipleUpload::create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'ref_table' => $request->ref_table,
                    'ref_id'    => $request->ref_id,
                ]);
            }
        }

        return back()->with('success', 'File berhasil di-upload!');
    }

    // Menghapus file
    public function destroy($id)
    {
        $file = MultipleUpload::findOrFail($id);

        Storage::delete($file->file_path);
        $file->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
