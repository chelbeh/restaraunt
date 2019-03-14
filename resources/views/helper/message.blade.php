@if (session('message'))
<div class="toast-wrapper position-absolute w-100 d-flex flex-column p-4">
    <div class="toast ml-auto" role="alert" data-delay="3000" data-autohide="true">
        <div class="toast-header">
            <strong class="mr-auto text-primary">Сообщение</strong>
            <small class="text-muted">только что</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">
           {{session('message')}}
        </div>
    </div>
</div>
@endif
<script>
    $(document).ready(function () {
        $('.toast').toast('show');
    });
</script>