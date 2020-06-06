@extends('layout')

@section('content')
<div class="row new-bin">
    <div class="small-12 columns">
        <form action="/" method="POST">
            @csrf
            <label>
                <span>Name thy Bin</span>
                <input type="text" name="paste-title">
            </label>
            <label>
                <span>Your code, monsieur</span>
                <textarea name="paste" placeholder=""></textarea>
            </label>
            <button type="submit">Bin It!</button>
        </form>
    </div>
</div>
@endsection
