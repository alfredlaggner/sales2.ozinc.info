<div class="card">
    <div class="card-header" id="headingTen">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button"
                    data-toggle="collapse"
                    data-target="#collapseTen" aria-expanded="false"
                    aria-controls="collapseTen">
                <h6>Aged Receivables</h6>
            </button>
        </h2>
    </div>
    <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
         data-parent="#accordionExample">
        <div class="card-body">
            <form method="get"
                  action="{{route('new_aged_receivables')}}">
                @csrf
                @can('isAdmin')

                @elsecan('isSalesPerson')
                    <input name="rep_id" type="hidden" value="{{$salesperson_id}}">
                @endcan

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" name="display" value="display"
                                class="btn btn-primary">
                            Ready Set Go
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
