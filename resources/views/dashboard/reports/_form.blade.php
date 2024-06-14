@csrf
<div class="form-group mb-4">
    <label class="col-md-12 p-0">Subject</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="subject" type="text" placeholder="subject"
               class="form-control p-0 border-0 @error('subject') is-invalid @enderror" value="{{ old('subject', $report->subject) }}">
        @error('subject')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Message</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="message" type="text" placeholder="message"
               class="form-control p-0 border-0 @error('message') is-invalid @enderror" value="{{ old('message', $report->message) }}">
        @error('message')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group mb-4">
    <label class="col-md-12 p-0">Sender Name</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="sender_name" type="text" placeholder="sender_name"
               class="form-control p-0 border-0 @error('sender_name') is-invalid @enderror" value="{{ old('sender_name', $report->sender_name) }}">
        @error('sender_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group mb-4">
    <label class="col-md-12 p-0">Sender Email</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="sender_email" type="text" placeholder="sender_email"
               class="form-control p-0 border-0 @error('sender_email') is-invalid @enderror" value="{{ old('sender_email', $report->sender_email) }}">
        @error('sender_email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Sender Phone</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="sender_phone" type="text" placeholder="sender_phone"
               class="form-control p-0 border-0 @error('sender_phone') is-invalid @enderror" value="{{ old('sender_phone', $report->sender_phone) }}">
        @error('sender_phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label class="col-md-12 p-0">Location</label>
    <div class="col-md-12 border-bottom p-0">
        <input name="location" type="text" placeholder="location"
               class="form-control p-0 border-0 @error('location') is-invalid @enderror" value="{{ old('location', $report->location) }}">
        @error('location')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group mb-4 d-flex">
    <div class="col-sm-2">
        <a href="{{route('reports.index')}}" class="btn btn-danger">Cancel</a>
    </div>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-success">{{$buttonText}}</button>
    </div>
</div>



