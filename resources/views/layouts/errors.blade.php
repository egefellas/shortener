@if ($errors->any())
    <div class="alert alert-danger" style="padding:5px;background-color: darkred;color:white;border:1px solid red; margin: 1rem 3rem">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
