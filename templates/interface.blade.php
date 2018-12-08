namespace {{$data['namespace']}};

@if(isset($data['annotations']))@include('LaravelFileGenerator::annotations',['notes'=>$data['annotations']])@endif

interface {{$data['interface_name']}}
{
@foreach($data['functions'] as $function)
    {!! $function !!};

@endforeach
}