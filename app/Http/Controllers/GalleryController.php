<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $collection = QueryBuilder::for(Gallery::class)
                ->allowedFilters(['btn', 'date', 'company', 'title', 'description', AllowedFilter::scope('month')])
                ->where('region', '61 CSB MZD')
                ->orderBy('created_at', 'desc')->paginate(25)->withQueryString();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(Gallery::class)
                ->allowedFilters(['btn', 'date', 'company', 'title', 'description', AllowedFilter::scope('month')])
                ->where('region', '64 CSB MPR')
                ->orderBy('created_at', 'desc')->paginate(25)->withQueryString();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(Gallery::class)
                ->allowedFilters(['btn', 'date', 'title', 'description', 'company', AllowedFilter::scope('month')])
                ->orderBy('created_at', 'desc')->paginate(25)->withQueryString();
        }
//        $gallery = Gallery::all();
        return view('gallery.index', compact(['collection']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreGalleryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $count = 1;
//        dd(count($request->attachments_1));
        $path = null;
        if ($request->hasFile('attachments_1')) {
            foreach ($request->attachments_1 as $key => $file) {
                if ($count == count($request->attachments_1)) {
                    $path = $path . '' . $file->store('', 'public');
                } else {
                    $path = $path . '' . $file->store('', 'public') . ',';
                }
                $count++;
            }
        }

        $request->merge(['attachments' => $path]);
        $request->merge(['added_by' => auth()->user()->id]);
        $gallery = Gallery::create($request->all());
        session()->flash('message', 'Gallery successfully created.');
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGalleryRequest $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {

        $path = $gallery->attachments;
        if ($request->hasFile('attachments_1')) {
            foreach ($request->attachments_1 as $key => $file) {
                $path = $path . ',' . $file->store('', 'public') . ',';
            }
        }


        $request->merge(['attachments' => $path]);
        $request->merge(['added_by' => auth()->user()->id]);
        $gallery->update($request->all());
        session()->flash('message', 'Gallery successfully updated.');
        return redirect()->route('gallery.show', $gallery->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery, $id)
    {


        $replace_url = str_replace($id, "", $gallery->attachments);
        $replace_url = str_replace(",,", ",", $replace_url);


        if (empty($replace_url)) {
            $replace_url = $gallery->attachments;
        }


        if ($replace_url[0] == ',') {
            $replace_url = substr_replace($replace_url, '', 0, 1);
        }

        $length = strlen($replace_url);

        if ($length == 0) {
            $replace_url = null;
        } elseif ($replace_url[$length - 1] == ',') {

            $replace_url = substr_replace($replace_url, '', strlen($replace_url) - 1, 1);
        }

        if (File::exists(public_path(Storage::url($id)))) {
            File::delete(public_path(Storage::url($id)));
            $gallery->attachments = $replace_url;
            $gallery->save();
            session()->flash('message', 'Image successfully deleted.');
            return redirect()->route('gallery.show', $gallery->id);
        } else {
            session()->flash('message', 'Image does not exist');
            return redirect()->route('gallery.show', $gallery->id);
        }
    }


    public function destroyAlbum(Gallery $gallery)
    {
        $files = explode(',', $gallery->attachments);
        foreach ($files as $key) {
            if (File::exists(public_path(Storage::url($key)))) {
                File::delete(public_path(Storage::url($key)));
            }
        }
        $gallery->delete();
        session()->flash('message', 'Gallery has been successfully deleted.');
        return redirect()->route('gallery.index');
    }
}
