<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;
use App\Http\Resources\PublicationCollection;
use App\Http\Resources\PublicationResource;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class PublicationController extends Controller
{
    protected $publication;

    public function __construct(Publication $publication)
    {
        $this->publication = $this->publication;
    }
    /**
     * Display a listing of the publications.
     */
    public function index()
    {
        $publications = Publication::whereNot('date_pub', '=', null)->orderBy('date_pub', 'DESC')->paginate(10);
        return response()->json(new PublicationCollection($publications));
    }

    /**
     * Store a newly created publication.
     */
    public function store(PublicationStoreRequest $request)
    {
        $validated_data = $request->validated();
        $link = '';
        if (isset($validated_data['file'])) {
            $file = $validated_data->file('file');
            $link = $file->store('uploads/publications/');
        }
        $publication = new Publication();
        $publication->typePub = Publication::SIMPLE;
        $publication->contenu_pub = $validated_data['contenu_pub'];
        $publication->fileName = $link;
        $publication->user_id = auth()->user()->id;
        $publication->save();
        return new PublicationResource($publication);
    }

    /**
     * Display the specified publication by id.
     */
    public function show(string $id)
    {
        $publication = $this->publication->with('user', 'jackpot')->find($id);
        return new PublicationResource($publication);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationUpdateRequest $request, string $id)
    {
        $publication = $this->publication->where('user_id', '=', auth()->user->id)->find($id);
        if ($publication == null)
            return response()->json("Not Found", 404);
        $validated_data = $request->validated();
        $publication->contenu_pub = $validated_data['contenu_pub'];
        $file = $validated_data.file('file');
        if ($file) {
            $file = $validated_data->file('file');
            $link = $file->store('uploads/publications/');
        }
        $publication->fileName = $link;
        $publication->save();
        return new PublicationResource($publication);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication = $this->publication->where('user_id', '=', auth()->user->id)->find($id);
        if ($publication == null)
            return response()->json("Not Found", 404);
        $publication->delete();
        $publication->save();
        return response()->json('No Content', 304);
    }
}
