@foreach ($posting as $post)
    <div class="card mb-3">
        <div class="card-header">
            <h3> {{$post->title}}</h3>
        </div>
        <div class="card-body">
            <p>{{$post->body}}</p>
            <div class="text-center">
                <button type="button" class="btn btn-success">Read More</button>
            </div>
        </div>
    </div>
@endforeach