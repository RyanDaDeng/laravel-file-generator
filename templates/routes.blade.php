// for web
Route::prefix('{{$data['domain']}}/web')->group(function () {
@foreach($data['uri'] as $uri)
    Route::{{$uri['method']}}('{{$uri['uri']}}', '{{$uri['web_class']}}{{$uri['function']}}')->name('{{$uri['key']}}');
@endforeach
});



// for api
Route::prefix('{{$data['domain']}}/api/v1')->group(function () {
@foreach($data['uri'] as $uri)
    Route::{{$uri['method']}}('{{$uri['uri']}}', '{{$uri['api_class']}}{{$uri['function']}}')->name('{{$uri['key']}}');
@endforeach
});