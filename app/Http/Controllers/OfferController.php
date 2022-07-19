<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\PhotoTrait;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class OfferController extends Controller
{
    use PhotoTrait;
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        // View form to add new offer
        return view('offers.create');
    }

    public function store(OfferRequest $req)
    {
        // Save offer into DB using AJAX
        $file_name = $this->upload($req->photo, 'assets/img/offers');
        $offer = Offer::create([
            'photo'     => $file_name,
            'name'      => $req->name,
            'price'     => $req->price,
            'description'   => $req->description,
        ]);
        //return back()->with(['success' => 'تم حفظ العرض بنجاح']);
        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'تم حفظ العرض بنجاح'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'خطأ في الحفظ'
            ]);
        }
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function update(OfferRequest $req)
    {
        $offer = Offer::find($req->id);
        if (!$offer) {
            return response()->json([
                'status' => false,
                'msg' => 'خطأ في الوصول'
            ]);
        }
        $offer->update($req->all());
        //return back()->with(['success' => 'تم تعديل العرض بنجاح']);
        return response()->json([
            'status' => true,
            'msg' => 'تم تعديل العرض ' . $req->id . ' بنجاح'
        ]);
    }

    public function delete(Request $req)
    {
        $offer = Offer::find($req->id);
        if (!$offer) {
            return response()->json([
                'status' => false,
                'msg' => 'خطأ في الوصول'
            ]);
        }
        $offer->delete($req->id);
        //return back()->with(['error' => 'تم حذف العرض بنجاح']);
        return response()->json([
            'status' => true,
            'msg' => 'تم حذف العرض ' . $req->id . ' بنجاح'
        ]);
    }
}
