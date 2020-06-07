@extends('layout')

@push('scripts')
  <script async src="https://www.google.com/recaptcha/api.js"></script>
  <script type="text/javascript">
    function onBinIt(token) {
      document.getElementById("bin-form").submit();
    }
  </script>
@endpush

@section('content')
<div class="row new-bin">
    <div class="small-12 columns">
        <form action="/" method="POST" id="bin-form">
            @csrf
            <label>
                <span>Name thy Bin</span>
                <input type="text" name="paste-title">
            </label>
            <label>
                <span>Your code, monsieur</span>
                <textarea name="paste" placeholder=""></textarea>
            </label>
            <button
              class="g-recaptcha"
              data-sitekey="{{ env('RECAPTCHA_PUBLIC') }}"
              data-callback="onBinIt"
              data-action="">Bin It!</button>
        </form>
    </div>
</div>
@endsection
