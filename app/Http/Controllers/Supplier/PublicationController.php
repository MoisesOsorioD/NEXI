<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Category;
use App\Models\PublicationImage;
use App\Models\SupplierProfile;
use App\Http\Requests\PublicationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PublicationController extends Controller
{
    /**
     * Listado de publicaciones
     */
    public function index()
{
    $supplierProfile = auth()->user()->supplierProfile;

    $publications = Publication::with('publicationImages')
        ->where('supplier_profile_id', $supplierProfile->id)
        ->latest()
        ->get();

    return view(
        'dashboard.supplier.publications.index',
        compact('publications')
    );
}

    /**
     * Formulario para crear publicación
     */
public function create()
{
    $categories = Category::orderBy('name')->get();

    return view(
        'dashboard.supplier.publications.create',
        compact('categories')
    );
}

    /**
     * Guardar publicación
     */
    public function store(PublicationRequest $request)
{
    $supplierProfile = auth()->user()->supplierProfile;

    $publication = Publication::create([

        'name' => $request->name,

        'description' => $request->description,

        'type' => $request->type,

        'reference_price' => $request->reference_price,

        'unit_measure' => $request->unit_measure,

        'is_available' => $request->is_available,

        'category_id' => $request->category_id,

        'supplier_profile_id' => $supplierProfile->id,

    ]);

    if ($request->hasFile('images')) {

        foreach ($request->file('images') as $image) {

            $path = $image->store(
                'publications',
                'public'
            );

            PublicationImage::create([

                'image_path' => $path,

                'publication_id' => $publication->id,

            ]);
        }
    }

    return redirect()
        ->route('supplier.publications.index')
        ->with(
            'success',
            'Publicación creada correctamente.'
        );
}

    /**
     * Formulario para editar publicación
     */
    public function edit(Publication $publication)
    {
        $categories = Category::all();

    return view(
        'dashboard.supplier.publications.edit',
        compact(
            'publication',
            'categories'
        )
    );
    }

    /**
     * Actualizar publicación
     */
    public function update(PublicationRequest $request, Publication $publication)
{
    $publication->update([
    'name' => $request->name,
    'description' => $request->description,
    'type' => $request->type,
    'reference_price' => $request->reference_price,
    'unit_measure' => $request->unit_measure,
    'is_available' => $request->is_available,
    'category_id' => $request->category_id,
]);

/*
|--------------------------------------------------------------------------
| NUEVAS IMÁGENES
|--------------------------------------------------------------------------
*/

if ($request->hasFile('images')) {

    foreach ($request->file('images') as $image) {

        $path = $image->store(
            'publications',
            'public'
        );

        PublicationImage::create([

            'image_path' => $path,

            'publication_id' => $publication->id,

        ]);
    }
}

return redirect()
    ->route('supplier.publications.index')
    ->with(
        'success',
        'Publicación actualizada correctamente.'
    );


}



public function show(Publication $publication)
{
    return view(
        'dashboard.supplier.publications.show',
        compact('publication')
    );
}




public function destroyImage(PublicationImage $image)
{
    Storage::disk('public')->delete($image->image_path);

    $image->delete();

    return back()->with(
        'success',
        'Imagen eliminada correctamente.'
    );
}


    /**
     * Eliminar publicación
     */
    public function destroy(Publication $publication)
{
    $publication->delete();

    return redirect()
        ->route('supplier.publications.index')
        ->with(
            'success',
            'Publicación eliminada correctamente.'
        );
}
}