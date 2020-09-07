<div class="card">
    <div class="card-header" id="bonus_init">
        <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse"
                    data-target="#collapseInit" aria-expanded="false"
                    aria-controls="collapseInit">
                <h6 class="text-center">1099 Bonuses</h6>
            </button>
        </h2>
    </div>

    <div id="collapseInit" class="collapse" aria-labelledby="Init_commission"
         data-parent="#accordionExample">
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h6>Set bonus percentages</h6>
                    <form method="post"
                          action="{{route('1099_init')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="year">Year:</label>
                                <input class="form-control" name="year" type="text"
                                       value="{{$year}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="month">Pay Period:</label>
                                <select class="form-control" name="month_id">
                                    @for($i=0;$i< count($pay_periods);$i++)
                                        @if ($pay_periods[$i]['month'] == \Carbon\Carbon::now()->month-1)
                                            <option selected
                                                    value="{{$pay_periods[$i]['id']}}">
                                                <b>{{$pay_periods[$i]['month_name']}}</b>
                                                Part {{$pay_periods[$i]['half']}}
                                            </option>
                                        @else
                                            <option value="{{$pay_periods[$i]['id']}}">

                                                <b>{{$pay_periods[$i]['month_name']}}</b>
                                                Part {{$pay_periods[$i]['half']}}
                                            </option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <button type="submit" name="display" value="display"
                                        class="btn btn-primary">
                                    Ready set go
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col text-center">
                    <h6>View bonuses</h6>
                    <form method="post"
                          action="{{route('admin_1099')}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="form-group col-12">
                                <button type="submit" name="display" value="display"
                                        class="btn btn-primary">
                                    Ready set go
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
