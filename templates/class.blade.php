namespace {{$data['namespace']}};

@foreach($data['use'] as $use)
use {{$use}};
@endforeach

{{$data['class_type']}} {{$data['class_name']}} @if($data['extends'])extends @endif{{$data['extends']}} @if($data['implements'])implements @foreach($data['implements'] as $key =>$implement)@if(count($data['implements']) === $key+1){{$implement}} @else{{$implement}},@endif @endforeach @endif

{
@foreach($data['traits'] as $trait)
    use {{$trait}};
@endforeach

@foreach($data['properties'] as $property)
    {{$property}};
@endforeach

@foreach($data['functions'] as $function)
    {!! $function !!}

@endforeach
}