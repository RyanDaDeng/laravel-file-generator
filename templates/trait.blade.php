namespace {{$data['namespace']}};

@foreach($data['use'] as $use)
use {{$use}};
@endforeach

trait {{$data['trait_name']}}

{
@foreach($data['traits'] as $trait)
    use {{$trait}};
@endforeach

@foreach($data['functions'] as $function)
    {{$function}}
    {

    }

@endforeach
}