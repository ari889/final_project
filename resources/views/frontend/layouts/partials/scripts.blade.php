<script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
@foreach($scripts as $script)
    <script src="{{asset('frontend/js/'.$script.'.js')}}"></script>
@endforeach
