namespace {{$data['namespace']}};

interface {{$data['interface_name']}}

{
@foreach($data['functions'] as $function)
    {{$function}}
    {

    }

@endforeach
}