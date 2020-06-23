@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bedrooms</th>
                                <th scope="col">Bathrooms</th>
                                <th scope="col">Storeys</th>
                                <th scope="col">Garages</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($field_data))
                                @foreach($field_data as $d)
                                    <tr>
                                        <th scope="row">{{$d->id}}</th>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>{{$d->bedrooms}}</td>
                                        <td>{{$d->bathrooms}}</td>
                                        <td>{{$d->storeys}}</td>
                                        <td>{{$d->garages}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg ">Filter</label>
                <form action="{{url('api/search')}}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Bedrooms</label>
                        <select id="disabledSelect" name="bedrooms" class="form-control">
                            <option selected>Select bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Bathrooms</label>
                        <select id="disabledSelect" name="bathrooms" class="form-control">
                            <option selected>Select bathrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Storeys</label>
                        <select id="disabledSelect" name="storeys" class="form-control">
                            <option selected>Select storeys</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Garages</label>
                        <select id="disabledSelect" name="garages" class="form-control">
                            <option selected>Select garages</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
