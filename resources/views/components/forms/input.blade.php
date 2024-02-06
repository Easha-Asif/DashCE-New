@props([
    'type', 'name', 'placeholder'
])

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{$title}}</label>
    <div class="col-sm-12 col-md-7">
        <input type="{{$type}}" name="{{$name}}" class="form-control" placeholder="{{$placeholder}}" {{ $attributes }}>
    </div>
</div>