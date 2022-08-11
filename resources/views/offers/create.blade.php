@extends('layouts.master')

@section('content')
<div class="container relative flex flex-column items-top justify-center py-4">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    <a class="btn btn-primary btn-block" href="{{route('offers')}}">Back to offers</a>
    <a class="btn btn-primary btn-block" href="{{route('offers.create')}}">Add another offer</a>
    @else
    <h2 class="my-5">Add Your Offer</h2>
    <div>
        <form method="POST" id="offer_create_form" enctype="multipart/form-data">
            @csrf
            {{-- <input name="_token" value="{{csrf_token()}}" > --}}
            <div class="form-group pt-3">
                <label for="photo">Offer photo</label>
                <input type="file" class="form-control" id="photo" name="photo" value="{{ old('photo') }}" placeholder="Offer photo">
                
                <small id="photo_error" class="form-text text-danger"></small>

            </div>
            <div class="form-group pt-3">
                <label for="name">Offer Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Offer Name">

                <small id="name_error" class="form-text text-danger"></small>

            </div>
            <div class="form-group pt-3">
                <label for="price">Offer Price</label>
                <input type="number" step=".001" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Offer Price">

                <small id="price_error" class="form-text text-danger"></small>

            </div>
            <div class="form-group pt-3">
                <label for="description">Offer Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Offer Description">
                
                <small id="description_error" class="form-text text-danger"></small>

            </div>
            <button type="button" id="save_offer" class="btn btn-primary btn-block my-5" style="width:100%">Submit</button>
        </form>
        <a class="btn btn-success btn-block" style="width:100%" href="{{route('offers')}}">Back to offers</a>
    </div>
    @endif
</div>
@stop

@section('script')
<script>
    $(document).on('click', '#save_offer', function(e) {
        e.preventDefault();
        let form = $('#offer_create_form')[0],
            fd = new FormData(form);
        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{Route('offers.store')}}",
            data: fd,
            processData: false,
            contentType: false,
            cash: false,
            success: function(data) {
                if (data.status == true)
                    form.reset();
                alert(data.msg);
            },
            error: function(reject) {

                let response = $.parseJSON(reject.responseText);
                $.each(response.errors,function(key, val){
                    $('#'+key+'_error').text(val[0]);
                });

            }
        });
    });
</script>
@stop