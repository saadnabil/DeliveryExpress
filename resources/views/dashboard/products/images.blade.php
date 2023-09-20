@foreach($images as $image)
 <div class="col"><img src="{{ url('storage/'. $image->image) }}" width="70"
                            class="border rounded cursor-pointer" alt=""></div>
@endforeach
