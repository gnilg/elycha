<?php
namespace App\Http\Controllers\Api\Version;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Publication;
use App\Services\PublicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PublicationController extends Controller
{
    protected $publicationService;

    public function __construct(PublicationService $publicationService)
    {
        $this->publicationService = $publicationService;
        $this->authorizeResource(Publication::class, 'publication');
    }

    public function index()
    {
        return response()->json($this->publicationService->getAll());
    }

    public function show($id)
    {
        return response()->json($this->publicationService->getById($id));
    }

    public function getPublicationbyId(Request $request, $id)
    {

        info('request hit');
        return response()->json($this->publicationService->getById($id), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label'       => 'required|string|max:255',
            'place'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'place_lat'   => 'nullable|numeric',
            'place_long'  => 'nullable|numeric',
            'photo'       => 'nullable|image|max:2048',
            'user_id'     => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'category_type_id' => 'required|exists:category_types,id',
            'status'      => 'required|boolean',
            'is_immo'     => 'required|boolean',
        ]);

        $publication = $this->publicationService->create($request);
        return response()->json($publication, 201);
    }

    public function update(Request $request, Publication $publication)
    {
        info('edit publication');
        $this->authorize('update', $publication);
        // Validate the incoming request
        $validated =  $request->validate([
            'label'       => 'required|string|max:255',
            'place'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'category_id' => 'required|string',
            'status' => 'sometimes|string',
            'category_type_id' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Optional, only update if provided
            'photos.*'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Optional, only update if provided
        ]);

        info( $validated);

        DB::beginTransaction();

        try {
            // Find the publication by ID
           // $publication = Publication::findOrFail($id);

            // Update the main photo if provided
            if ($request->hasFile('photo')) {
                // Delete the old photo if exists
                if ($publication->photo) {
                    Storage::disk('public')->delete($publication->photo);
                }
                // Save the new photo
                $mainPhotoPath = $request->file('photo')->store('photos', 'public');
                $publication->photo = $mainPhotoPath;
            }

            // Update the publication fields
            $publication->label = $request->label;
            $publication->place = $request->place;
            $publication->description = $request->description;
            $publication->price = $request->price;
            $publication->category_id = $request->category_id;
            $publication->status = $request->status;
            $publication->category_type_id = $request->category_type_id;
            $publication->save(); 

            // Handle mini photos (if any)
            if ($request->hasFile('photos')) {
                // Delete old mini photos
                Image::where('publication_id', $publication->id)->delete();

                // Save the new mini photos
                foreach ($request->file('photos') as $miniPhoto) {
                    $miniPath = $miniPhoto->store('photos', 'public');

                    Image::create([
                        'publication_id' => $publication->id,
                        'photo'          => $miniPath,
                    ]);
                }
            }

            DB::commit();

            return response()->json(['message' => 'Publication updated successfully', 'publication' => $publication], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to update publication', 'error' => $e->getMessage()], 500);
        }
    
    }

    public function editPublication(Request $request, $id)
    {

        info('edit publication');
            // Validate the incoming request
            $validated =  $request->validate([
                'label'       => 'required|string|max:255',
                'place'       => 'required|string|max:255',
                'description' => 'required|string',
                'price'       => 'required|numeric',
                'category_id' => 'required|string',
                'status' => 'sometimes|string',
                'category_type_id' => 'required|string',
                'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Optional, only update if provided
                'photos.*'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Optional, only update if provided
            ]);

            info( $validated);
    
            DB::beginTransaction();
    
            try {
                // Find the publication by ID
                $publication = Publication::findOrFail($id);
    
                // Update the main photo if provided
                if ($request->hasFile('photo')) {
                    // Delete the old photo if exists
                    if ($publication->photo) {
                        Storage::disk('public')->delete($publication->photo);
                    }
                    // Save the new photo
                    $mainPhotoPath = $request->file('photo')->store('photos', 'public');
                    $publication->photo = $mainPhotoPath;
                }
    
                // Update the publication fields
                $publication->label = $request->label;
                $publication->place = $request->place;
                $publication->description = $request->description;
                $publication->price = $request->price;
                $publication->category_id = $request->category_id;
                $publication->status = $request->status == "1" ? 1:0;
                $publication->category_type_id = $request->category_type_id;
                $publication->save(); 
    
                // Handle mini photos (if any)
                if ($request->hasFile('photos')) {
                    // Delete old mini photos
                    Image::where('publication_id', $publication->id)->delete();
    
                    // Save the new mini photos
                    foreach ($request->file('photos') as $miniPhoto) {
                        $miniPath = $miniPhoto->store('photos', 'public');
    
                        Image::create([
                            'publication_id' => $publication->id,
                            'photo'          => $miniPath,
                        ]);
                    }
                }
    
                DB::commit();
    
                return response()->json(['message' => 'Publication updated successfully', 'publication' => $publication], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Failed to update publication', 'error' => $e->getMessage()], 500);
            }
        
    }

    public function destroy(Publication $publication)
    {
        info('Publication deletion', [
            'publication_id' => $publication->id,
            'publication_owner' => $publication->user_id,
            'auth_user_id' => auth()->id(),
        ]);
        info('Publication deletion');
        $this->authorize('delete', $publication);
        $this->publicationService->delete($publication->id);
        return response()->json(['message' => 'Deleted successfully']);
    }

    public function search(Request $request)
    {
        info('Search request');
        $publication = $this->publicationService->search($request);
        return response()->json($publication, 200);
    }

    public function searchUser(Request $request)
    {
        info('Search user request');
        $publication = $this->publicationService->searchUser($request);
        return response()->json($publication, 200);
    }

    public function searchFavorite(Request $request)
    {
        info('Search favorite request');
        $publication = $this->publicationService->searchFavorite($request);
        return response()->json($publication, 200);
    }
    public function paginate(Request $request)
    {

        info('Publications Paginate request');
        $publications = $this->publicationService->paginate($request);
        return response()->json($publications);
    }

    public function like(Publication $publication)
    {
        info('set like');

        $liked = $this->publicationService->setLike($publication);

        info('set like ok');
        return response()->json(['liked' => ! $liked], 200);
    }

    public function paginateSearchLikes(Request $request)
    {
        $publications = $this->publicationService->paginateSearchLikes($request);
        return response()->json($publications);
    }

    public function createPublication(Request $request)
    {

        info('create publication');
       

        info($request->all());


        $validator = Validator::make($request->all(), [
            'label'       => 'required|string|max:255',
            'place'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'is_immo'       => 'sometimes|boolean',
            'category_id' => 'required|integer',
            'category_type_id' => 'required|integer',
            'photo'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'photos.*'    => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            info($validator->errors());
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Save main publication
            $mainPhotoPath = $request->file('photo')->store('photos', 'public');

            $publication = Publication::create([
                'label'       => $request->label,
                'place'       => $request->place,
                'description' => $request->description,
                'price'       => $request->price,
                'photo'       => $mainPhotoPath,
                'category_id' => $request->category_id,
                'category_type_id' => $request->category_type_id,
                'is_immo'     => $request->category_id == 1 ? 1 : 0,
                'user_id'     => auth()->id(),
            ]);

            // Save mini photos to images table
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $miniPhoto) {
                    $miniPath = $miniPhoto->store('photos', 'public');

                    Image::create([
                        'publication_id' => $publication->id,
                        'photo'          => $miniPath,
                        'path'          => $miniPath,
                    ]);
                }
            }

            DB::commit();

            return response()->json(['message' => 'Publication created successfully', 'publication' => $publication], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to create publication', 'error' => $e->getMessage()], 500);
        }
    }

    public function getUserPublications(Request $request)
    {

        info('get user publications');
        $user = auth()->user(); // Get the authenticated user

        $publications = Publication::where('user_id', $user->id)
            ->with(['category', 'user', 'likess', 'photos']) // Optional: eager load related data
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($publications, 200);
    }

}
