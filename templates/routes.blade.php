Route::prefix('{{$data['prefix']}}')->middleware(@json($data['middleware']))->namespace('{{$data['namespace']}}')->group(function () {
@foreach($data['uri'] as $uri)
    Route::{{$uri['method']}}('{{$uri['uri']}}', '{{$uri['class']}}{{$uri['function']}}')->name('{{$uri['key']}}');
@endforeach
});