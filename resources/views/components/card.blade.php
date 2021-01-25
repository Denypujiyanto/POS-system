@props(['header', 'body', 'icon' => '<i class="nc-icon nc-money-coins text-success"></i>', 'footer' => ' Hari Ini'])

<div class="card card-stats">
    <div class="card-body ">
        <div class="row">
            <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                    {!! $icon !!}
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="numbers">
                    <p class="card-category">{{$header}}</p>
                    <p class="card-title" style="font-size: 1rem">{{$body}}
                        <p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer ">
        <hr>
        <div class="stats">
            {!! $footer !!}
        </div>
    </div>
</div>