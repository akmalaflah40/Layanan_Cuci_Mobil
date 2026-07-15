<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();

        return view('admin.services', compact('services'));
    }

    public function create()
    {
        return view('admin.service-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required|numeric',
            'status'=>'required',
            'gambar'=>'required|image'
        ]);

        $gambar = $request->file('gambar')->store('services','public');

        Service::create([
            'nama_layanan'=>$request->nama_layanan,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'status'=>$request->status,
            'gambar'=>$gambar
        ]);

        return redirect()->route('services.admin')
            ->with('success','Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.service-edit',compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nama_layanan'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required',
            'status'=>'required'
        ]);

        $data=$request->only([
            'nama_layanan',
            'deskripsi',
            'harga',
            'status'
        ]);

        if($request->hasFile('gambar')){

            Storage::disk('public')->delete($service->gambar);

            $data['gambar']=$request
                ->file('gambar')
                ->store('services','public');

        }

        $service->update($data);

        return redirect()->route('services.admin')
            ->with('success','Layanan berhasil diubah.');
    }

    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->gambar);

        $service->delete();

        return back()->with('success','Layanan berhasil dihapus.');
    }
}