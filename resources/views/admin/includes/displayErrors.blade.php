@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@if (session('error'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('error') }}
    </div>
@endif


@if (session('currentPassword'))
    <div class="alert alert-danger" id="flash-message">
        {{ session('currentPassword') }}
    </div>
@endif


