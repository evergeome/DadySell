@extends('layouts.master')

@section('content')
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
</div>
@endif
<table class="table table-hover">
    <caption>Offers</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">{{__('names.name')}}</th>
            <th scope="col">{{__('names.price')}}</th>
            <th scope="col">{{__('names.description')}}</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($offers as $offer)
        <tr>
            <th scope="row">{{$offer->id}}</th>
            <td><img src="{{URL::asset('assets/img/offers/'.$offer->photo)}}" alt="Offer {{$offer->name}} Image" width="50" height="50"></td>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->description}}</td>
            <td><a class="btn btn-success" href="{{route('offers.edit', $offer->id)}}">{{__('operations.edit')}}</a></td>
            <td><a class="btn btn-danger" id="delete_offer" href="">{{__('operations.delete')}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('script')
<script>
    $(document).on('click', '#delete_offer', function(e) {
        e.preventDefault();
        let offer = $(this).parents('tr'),
            id = offer.find('th').html();

        $.ajax({
            type: 'post',
            url: "{{Route('offers.delete')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'id': id,
            },
            success: function(data) {
                if (data.status == true)
                    offer.remove();
                alert(data.msg);
            },
            error: function(reject) {}
        });
    });
</script>
@stop