@extends('layouts.app')
@section('content')
@section('title', 'Initialize Monthly Bonus')

@section('content')
    <div class="container">
        <div class="card">
            <div class='card-header'>
                <h5>Bonuses for {{$month}} {{$year}}</h5>
            </div>
            <div class="card card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="get" action="{{route('bonus_update')}}">
                    @csrf
                    <table id="accounts" class="table table-bordered table-hover table-sm">
                    <thead>
                    <tr>
                        <th class="text-xl-ledt">Salesperson</th>
                        <th class="text-xl-left">New Bonus</th>
                        {{--
                                                <th class="text-xl-left">Action</th>
                        --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($bonuses as $bonus)
                            <input hidden name="bonus_id[]" value="{{$bonus->id}}">
                            <input hidden name="month" value="{{$month}}">
                            <input hidden name="year" value="{{$year}}">
                            <tr>
                                <td class="text-xl-left">{{$bonus->sales_person_name}}</td>
                                <td class="text-xl-left"><input class="form-control" name="percent[]"
                                                                  value="{{$bonus->bonus * 100}}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary btn-sm btn-block">Block level button</button>            </div>
            </form>

        </div>
    </div>
@endsection
