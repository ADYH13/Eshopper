<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){

        $categories = Categorie::all();
        return view('product.index')->with('categories',$categories);
    }

    public function create()
    {
        return view('product.create');
    }

    public function detail($id)
    {
        return view('product.detail');
    }

    public function modifier($id)
    {
        return view('product.modifier');
    }

    public function PostCategorie(Request $request){





        $request->validate([
            'nom_categorie' => 'required',
            'image' => [
                'required',
                File::image()
                    ->min(10)
                    ->max(1024 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(2000)->maxHeight(2000)),
            ],
            ]);

        $file = $request->file('image');
        $path = $file->store('image_categorie');
        $path = Str::remove('public/', $path);


        $categorie = new Categorie;
        $categorie->nom_categorie = $request->nom_categorie;
        $categorie->image = $path;
        $categorie->save();

        return redirect()->back();

    }

}
