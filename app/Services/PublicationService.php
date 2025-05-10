<?php
namespace App\Services;

use App\Models\Like;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationService
{
    public function getAll()
    {
        return Publication::latest()->get();
    }

    public function getById($id)
    {
        return Publication::with('category', 'user', 'likess', 'photos')->findOrFail($id);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        // $data["user_id"] = $this->getConnectedUserId();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        return Publication::create($data);
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        $data        = $request->all();

        if ($request->hasFile('photo')) {
            if ($publication->photo) {
                Storage::disk('public')->delete($publication->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $publication->update($data);
        return $publication;
    }

    public function delete($id)
    {
        $publication = Publication::findOrFail($id);

        // if ($publication->photo) {
        //     Storage::disk('public')->delete($publication->photo);
        // }

        $deleted = $publication->delete();

        if (!$deleted) {
            throw new \Exception("La suppression a échoué.");
        }
    
        return $deleted;
    }

    public function search(Request $request)
    {

        info('Search request');
        $query = Publication::query();

        if ($request->has('search')) {

            $search = trim($request->input('search'));

            if($search == "locationimmobilier") {
                info('locationimmobilier');
                $query->where('category_id', 1)
                      ->where('category_type_id', 1);
            } else if($search == "locationautomobile") {
                info('locationautomobile');
                $query->where('category_id', 2)
                      ->where('category_type_id', 1);

            } else if($search == "venteautomobile") {
                info('venteautomobile');
                $query->where('category_id', 2)
                      ->where('category_type_id', 3);

            } else if($search == "venteimmobilier") {
                info('venteimmobilier');
                $query->where('category_id', 1)
                      ->where('category_type_id', 3);

            } else if($search == "bailimmobilier") {
                info('bailimmobilier');
                $query->where('category_id', 1)
                      ->where('category_type_id', 2);

            } else {
                $query->where(function ($q) use ($search) {
                    $q->where('label', 'like', "%{$search}%")
                        ->orWhere('place', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });

            }
           
        }

       

        // 👉 Add with('likes') here
        $publications = $query->with('category', 'user', 'likess', 'photos')->orderBy('created_at', 'desc')->get();


        return response()->json($publications);
    }

    public function searchUser(Request $request)
    {

        info('Search request');
        $query = Publication::query();

        if ($request->has('search')) {

            info('Search user request param reeived');
            $search = trim($request->input('search'));

            
                $query->where('user_id', auth()->user()->id);
            
                $query->where(function ($q) use ($search) {
                    $q->where('label', 'like', "%{$search}%")
                        ->orWhere('place', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });

            
           
        }

        // 👉 Add with('likes') here
        $publications = $query->with('category', 'user', 'likess', 'photos')->latest()->get();


        return response()->json($publications);
    }

    public function searchWithPaginate()
    {
        $query = Publication::query();
        if ($request->filled('search')) {
            $query->where('label', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('created_at', 'desc');
        $publications = $query->paginate(10);

        return response()->json($publications);

    }

    public function paginate(Request $request)
    {
        info("Paginate request received");
        $perPage = $request->input('per_page', 10); // Optional: customize per page size

        $publications = Publication::with('category', 'user', 'likess', 'photos') // eager load relations
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'data'       => $publications->items(),
            'pagination' => [
                'total'         => $publications->total(),
                'per_page'      => $publications->perPage(),
                'current_page'  => $publications->currentPage(),
                'last_page'     => $publications->lastPage(),
                'next_page_url' => $publications->nextPageUrl(),
                'prev_page_url' => $publications->previousPageUrl(),
            ]]);
    }

    public function paginateSearchLikes(Request $request)
    {
        $userId = auth()->user()->id;

        info("Paginate search request received");
        $perPage = $request->input('per_page', 10); // Optional: customize per page size

        $publications = Publication::with('category', 'user', 'likess', 'photos')
            ->whereHas('likes', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'data'       => $publications->items(),
            'pagination' => [
                'total'         => $publications->total(),
                'per_page'      => $publications->perPage(),
                'current_page'  => $publications->currentPage(),
                'last_page'     => $publications->lastPage(),
                'next_page_url' => $publications->nextPageUrl(),
                'prev_page_url' => $publications->previousPageUrl(),
            ]]);
    }

    public function searchFavorite(Request $request)
    {
        $userId = auth()->user()->id;

        info("Paginate search favorite request received");
    
        // Default items per page: 10, but customizable via the request
        $perPage = $request->input('per_page', 10);
    
        // Initialize the publications query with necessary relationships
        $publications = Publication::with('category', 'user', 'likess', 'photos')
            ->whereHas('likes', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            });
    
        // Check if there is a 'search' query parameter
        if ($request->has('search')) {
            info('Search request param received');
    
            $search = trim($request->input('search'));
    
            // Apply search filters for 'label', 'place', and 'description' fields
            $publications->where(function ($query) use ($search) {
                $query->where('label', 'like', "%{$search}%")
                    ->orWhere('place', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }
    
        // Order by the most recent publications and paginate
        $publications = $publications->orderBy('created_at', 'desc')
            ->paginate($perPage);
    
        // Return the response with the publications data and pagination info
        return response()->json([
            'data' => $publications->items(),
            'pagination' => [
                'total' => $publications->total(),
                'per_page' => $publications->perPage(),
                'current_page' => $publications->currentPage(),
                'last_page' => $publications->lastPage(),
                'next_page_url' => $publications->nextPageUrl(),
                'prev_page_url' => $publications->previousPageUrl(),
            ],
        ]);
    }

    public function getConnectedUserId()
    {
        return auth()->user()->id;
    }

    public function setLike(Publication $publication)
    {

        $user = auth()->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $like = Like::where('publication_id', $publication->id)
            ->where('user_id', $user->id)
            ->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            Like::create([
                'publication_id' => $publication->id,
                'likeable_id' => $publication->id,
                'user_id'        => $user->id,
                'likeable_type'        => 'App\Models\Publication',
            ]);
            return response()->json(['liked' => true]);
        }

    }

}
