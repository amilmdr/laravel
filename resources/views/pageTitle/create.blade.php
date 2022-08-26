@extends('layout.master')
@section('content')
    <div class="wrapper">
        <div class="card-body">
            <div class="live-preview">
                {!! Form::open([
                    'route' => 'page_titlt.store',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                    'files' => true,
                    'class' => 'needs-validation',
                    'novalidate',
                ]) !!}

                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">Name </label>
                            {!! Form::text('page_titles_name', null, [
                                'placeholder' => 'Enter your Page Title',
                            
                                'class' => 'form-control' . ($errors->has('page_titles_name') ? ' form-error' : '') . '',
                                'required',
                            ]) !!}
                            @if ($errors->has('page_titles_name'))
                                <div class="invalid-feedback">{{ $errors->first('page_titles_name') }}</div>
                                <span class="text-danger">{{ $errors->first('page_titles_name') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">CSV or Excel File</label>
                            {!! Form::file('file', ['class' => 'form-control file-upload-info',
                            'accept'=>".csv,.xlsx"]) !!}
                            @if ($errors->has('file'))
                                <div class="invalid-feedback">{{ $errors->first('file') }}</div>
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div> --}}
                {!! Form::submit('Save',['class' => 'btn btn-primary btn-fw']) !!}
                <a href="{{ route('page.index') }}" class="btn btn-dark">Cancel</a>
                <!--end col-->

                <!--end row-->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
