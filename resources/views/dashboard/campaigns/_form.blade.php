@csrf


<div class="form-group mb-4">
    <label class="col-md-12 p-0">Title</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="title" type="text"
               class="form-control p-0 border-0 text-start @error('title') is-invalid @enderror" value="{{ old('title', $campaign->title) }}">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="form-group mb-4">
    <label class="col-md-12 p-0">Description</label>
    <div class="col-md-12 border-bottom p-0">
        <textarea name="description" type="text"
                  class="form-control p-0 border-0 @error('description') is-invalid @enderror">{{ old('description', $campaign->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="form-group mb-4">
    <label class="col-md-12 p-0" for="date">{{ __('Start_Date') }} </label>
        <div class="col-md-12 border-bottom p-0">

        <input name="start_date" type="text"
                  class="datepicker form-control @error('start_date') is-invalid @enderror"  value="{{ isset($campaign->date) ? $campaign->date->format('Y-m-d') : '' }}"
            autocomplete="off">
        @error('start_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0" for="date">{{ __('End_Date') }} </label>
    <div class="col-md-12 border-bottom p-0">

        <input name="end_date" type="text"
               class="datepicker form-control @error('end_date') is-invalid @enderror"  value="{{ isset($campaign->date) ? $campaign->date->format('Y-m-d') : '' }}"
               autocomplete="off">
        @error('end_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Collected Amount</label>
    <div class="col-md-12 border-bottom p-0">
        <textarea name="collected_amount" type="number"
                  class="form-control p-0 border-0 @error('collected_amount') is-invalid @enderror">{{ old('collected_amount', $campaign->collected_amount) }}</textarea>
        @error('collected_amount')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group mb-4">
    <label class="col-md-12 p-0">Poster</label>
    <div class="col-md-12 border-bottom p-0">
        <input type="hidden" name="image_hidden_value" class="image_hidden_value"
               value="{{ $campaign->image }}">
        <input name="poster" type="file" placeholder="poster"
               class="form-control p-0 border-0 @error('poster') is-invalid @enderror" onchange="loadPreview(this);"/>
        <div class="image-preview-container {{empty($campaign->poster) ? '' : 'show'}}">
            <img id="preview_img"
                 src="{{ empty($campaign->poster) ? '' : asset('storage/uploads/posts/' . $campaign->poster) }}"
                 class="img-fluid object-cover h-full w-full object-center" />
        </div>
        @error('poster')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<!-- <div>
    <button type="reset" class="btn btn-warning">Back</button>
    <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
</div> -->

{{--<div class="form-group mb-4">--}}
{{--    <label class="col-md-12 p-0">Participant Name</label>--}}
{{--    <div class="col-md-12 border-bottom p-0">--}}
{{--        <textarea name="participant_name" type="text"--}}
{{--                  class="form-control p-0 border-0 @error('participant_name') is-invalid @enderror">{{ old('participant_name', $campaign->participant_name) }}</textarea>--}}
{{--        @error('participant_name')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}



<div class="form-group mb-4 d-flex gap-2">
    <button class="btn btn-success">{{$buttonText}}</button>
    <a href="{{route('campaigns.index')}}" class="btn btn-info">Cancel</a>
</div>
