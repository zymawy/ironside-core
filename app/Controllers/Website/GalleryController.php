<?php

namespace Zymawy\Ironside\Http\Controllers\Website;

use Zymawy\Ironside\Models\PhotoAlbum;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryController extends WebsiteController
{
    public function index()
    {
        $perPage = 9;
        $page = input('page', 1);
        $baseUrl = config('app.url') . '/gallery';
        $items = PhotoAlbum::with('photos')->orderBy('name')->get();

        $total = $items->count();

        // paginator
        $paginator = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(),
            $perPage, $page, ['path' => $baseUrl, 'originalEntries' => $total]);

        // if pagination ajax
        if (request()->ajax()) {
            return response()->json(view('website.gallery.pagination')
                ->with('paginator', $paginator)
                ->render());
        }

        return $this->view('ironside::gallery.albums')->with('paginator', $paginator);
    }

    public function showAlbum($albumSlug)
    {
        $album = PhotoAlbum::where('slug', $albumSlug)->first();
        if(!$album) {
            return redirect('/gallery');
        }

        $items = $album->photos;
        $this->addBreadcrumbLink($album->name, '/gallery');

        return $this->view('ironside::gallery.album_show')->with('album', $album);
    }
}