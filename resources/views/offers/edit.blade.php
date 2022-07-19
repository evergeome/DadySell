@extends('layouts.master')

@section('content')
<div class="container relative flex flex-column items-top justify-center py-4">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    <a class="btn btn-primary btn-block" href="{{route('offers')}}">Back to offers</a>
    @else
    <h2 class="my-5">Edit Your Offer</h2>
    <div>
        <form method="POST" id="offer_update_form" action="">
            @csrf
            {{-- <input name="_token" value="{{csrf_token()}}" > --}}
            <div class="form-group pt-3">
                <label for="photo">Offer photo</label>
                <input type="file" class="form-control" id="photo" name="photo" value="{{ $offer->photo }}" placeholder="Offer photo">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label for="name">Offer Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $offer->name }}" placeholder="Offer Name">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label for="price">Offer Price</label>
                <input type="number" step=".001" class="form-control" id="price" name="price" value="{{ $offer->price }}" placeholder="Offer Price">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label for="description">Offer Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $offer->description }}" placeholder="Offer Description">
                @error('description')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="button" id="update_offer" class="btn btn-primary btn-block my-5" style="width:100%">Update</button>
        </form>
        <a class="btn btn-success btn-block" style="width:100%" href="{{route('offers')}}">Back to offers</a>
    </div>
    @endif
</div>
@stop

@section('script')
<script>
    $(document).on('click', '#update_offer', function(e) {
        e.preventDefault();
        let form = $('#offer_update_form')[0],
            fd = new FormData(form);
        fd.append('id', '{{$offer->id}}');
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{Route('offers.update')}}",
            data: fd,
            processData: false,
            contentType: false,
            cash: false,
            success: function(data) {
                if (data.status == true) {
                    //form.reset();
                }
                alert(data.msg);
            },
            error: function(reject) {}
        });
    });
</script>
@stop