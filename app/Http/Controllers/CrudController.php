<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\PhotoTrait;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    use PhotoTrait;
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(OfferRequest $req)
    {
        $file_name = $this->upload($req->photo, 'assets/img/offers');

        Offer::create([
            'photo'     => $file_name,
            'name'      => $req->name,
            'price'     => $req->price,
            'details'   => $req->details,
        ]);
        return back()->with(['success' => 'تم حفظ العرض بنجاح']);
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function update($id, OfferRequest $req)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($req->all());
        return back()->with(['success' => 'تم تعديل العرض بنجاح']);
    }

    public function delete($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete($id);
        return back()->with(['error' => 'تم حذف العرض بنجاح']);
    }
}
