<?php

namespace Zymawy\Ironside\Http\Controllers\Dashboard\General;

use Redirect;
use App\Http\Requests;
use Zymawy\Ironside\Models\Tag;
use Illuminate\Http\Request;
use Zymawy\Ironside\Http\Controllers\Dashboard\AdminController;

class TagsController extends AdminController
{
	/**
	 * Display a listing of tag.
	 *
	 * @return Response
	 */
	public function index()
	{
		save_resource_url();

		return $this->view('ironside::tags.index')->with('items', Tag::all());
	}

	/**
	 * Show the form for creating a new tag.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->view('ironside::tags.add_edit');
	}

	/**
	 * Store a newly created tag in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, Tag::$rules, Tag::$messages);

        $row = $this->createEntry(Tag::class, $request->only('name'));

        return redirect_to_resource();
	}

	/**
	 * Display the specified tag.
	 *
	 * @param Tag $tag
	 * @return Response
	 */
	public function show(Tag $tag)
	{
		return $this->view('ironside::tags.show')->with('item', $tag);
	}

	/**
	 * Show the form for editing the specified tag.
	 *
	 * @param Tag $tag
     * @return Response
     */
    public function edit(Tag $tag)
	{
		return $this->view('ironside::tags.add_edit')->with('item', $tag);
	}

	/**
	 * Update the specified tag in storage.
	 *
	 * @param Tag  $tag
     * @param Request    $request
     * @return Response
     */
    public function update(Tag $tag, Request $request)
	{
		$this->validate($request, Tag::$rules, Tag::$messages);

        $this->updateEntry($tag, $request->only('name'));

        return redirect_to_resource();
	}

	/**
	 * Remove the specified tag from storage.
	 *
	 * @param Tag  $tag
     * @param Request    $request
	 * @return Response
	 */
	public function destroy(Tag $tag, Request $request)
	{
		$this->deleteEntry($tag, $request);

        return redirect_to_resource();
	}
}
