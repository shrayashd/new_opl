<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Media;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{

    protected $sizes;

    public function __construct()
    {
        $this->sizes  = image_sizes();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::latest()->get();
        return view('admin.media.index', compact('medias'));
    }

    public function mediapopup()
    {
        $medias = Media::latest()->get();
        return view('admin.media.popup', compact('medias'));
    }

    public function medialist()
    {
        $medias = Media::latest()->get();
        return view('admin.media.list', compact('medias'));
    }

    public function gallerymedialist($id)
    {
        $id = explode(',', $id);
        return view('admin.media.gallery.gallerylist', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($image = $request->file('file')) {

            $names = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            if (Media::where('name', $names)->exists()) {
                $name = $names . '-' . date('YmdHis');
            } else {
                $name = $names;
            }
            $extension = $image->getClientOriginalExtension();
            $slugify = make_slug($name);

            $image_new_name = $slugify . '.' . $extension;
            $image->move(public_path('storage/'), $image_new_name);
            if (in_array(strtolower($extension), ['png', 'jpg', 'jpeg', 'webp', 'heic'], true)) {
                list($width, $height) = $image ? getimagesize(public_path('storage/' . $image_new_name)) : [null, null];
            }
            $fsize = round(filesize(public_path('storage/' . $image_new_name)) / 1024);

            $fileName = $image_new_name;

            if (in_array(strtolower($extension), ['png', 'jpg', 'jpeg', 'webp', 'heic'], true)) {

                if ($this->sizes) {
                    foreach ($this->sizes as $resize) {
                        if ($resize['width'] && $resize['height']) {
                            if ($resize['width'] < $width && $resize['height'] < $height) {
                                $originalImage = Image::make(public_path('/storage/' . $fileName));
                                $resizedImage = $originalImage->fit((int) $resize['width'], (int) $resize['height'], function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                                $resizedFilename = make_slug($name . '-' . $resize['width'] . 'x' . $resize['height']) . '.' . $extension;
                                $resizedImage->save(public_path('storage/') . $resizedFilename);
                            }
                        }
                    }
                }
            }

            Media::create([
                'name' => $name,
                'url' => $slugify,
                'extention' => $extension,
                'fullurl' => '/storage/' . $fileName,
                'alt' => $name,
                'width' => $width ?? '',
                'height' => $height ?? '',
                'size' => (int) $fsize . 'KB',
                'date' => date('Y-m-d H:i:s')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Media $media)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Media $media)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $medium)
    {
        $medium->update($request->all());
        return redirect()->route('media.index')->with('message', 'Update Successfully');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Media $media)
    // {
    //     //
    // }

    public function mediadestroy($image_id)
    {
        $media = Media::findOrFail($image_id);
        removeFile($media->fullurl);

        if ($this->sizes) {
            foreach ($this->sizes as $resize) {
                if ($resize['width'] && $resize['height']) {
                    removeFile('/storage/' . $media->url . '-' . $resize['width'] . 'x' . $resize['height'] . '.' . $media->extention);
                }
            }
        }

        $media->delete();
    }
}
