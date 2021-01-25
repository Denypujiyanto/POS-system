@props(['type' => 'primary', 'message'])

<div class="alert alert-{{ $type }} alert-dismissible fade show" style="position:sticky; top:13vh; left: 55vw; width: 50%;z-index: 10">
    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="nc-icon nc-simple-remove"></i>
    </button>
    <span>
        <b> {!! $message !!} </b>
    </span>
</div>