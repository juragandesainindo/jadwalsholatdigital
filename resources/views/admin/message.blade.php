@if (session('success'))
<div class="alert alert-success" role="alert" id="success-alert">
    <strong>Success! </strong>
    {{ session('success') }}
</div>
@endif