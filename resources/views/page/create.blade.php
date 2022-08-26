@extends('layout.master')
@section('content')
    <div class="wrapper">
        <div class="card-body">
            <div class="live-preview">
                {!! Form::open([
                    'route' => 'page.store',
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
                            <label for="firstNameinput" class="form-label">Title </label>
                            {!! Form::text('pages_title', null, [
                                'placeholder' => 'Enter your Page Title',
                                'oninput' => 'create_slug(this)',
                                'class' => 'form-control' . ($errors->has('pages_title') ? ' form-error' : '') . '',
                                'required',
                            ]) !!}
                            @if ($errors->has('pages_title'))
                                <div class="invalid-feedback">{{ $errors->first('pages_title') }}</div>
                                <span class="text-danger">{{ $errors->first('pages_title') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">Slug</label>
                            {!! Form::text('pages_slug', null, [
                                'placeholder' => 'Enter your Page Title',
                                'id' => 'slug',
                            
                                'class' => 'form-control' . ($errors->has('pages_slug') ? ' form-error' : '') . '',
                                'readonly',
                                'required',
                            ]) !!}
                            {{-- {!! Form::hidden('slug',['id'=>"h_slug",'value'=>"old('slug')"]) !!} --}}
                            <input type="hidden" value="{{ old('slug') }}" name="slug" id="h_slug" />
                            @if ($errors->has('pages_slug'))
                                <div class="invalid-feedback">{{ $errors->first('pages_slug') }}</div>
                                <span class="text-danger">{{ $errors->first('pages_slug') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">Description</label>
                            {!! Form::text('pages_description', null, [
                                'placeholder' => 'Enter your Page Title',
                                'class' => 'form-control' . ($errors->has('page_description') ? ' form-error' : '') . '',
                                'required',
                            ]) !!}
                            @if ($errors->has('pages_description'))
                                <div class="invalid-feedback">{{ $errors->first('pages_description') }}</div>
                                <span class="text-danger">{{ $errors->first('pages_description') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">Image</label>
                            {!! Form::file('pages_image', ['class' => 'form-control file-upload-info']) !!}
                            @if ($errors->has('pages_image'))
                                <div class="invalid-feedback">{{ $errors->first('pages_image') }}</div>
                                <span class="text-danger">{{ $errors->first('pages_image') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="Forminputgender" class="form-label">Page Title</label>
                            {!! Form::select('pages_pageTitle', $pages->pluck('page_titles_name', 'page_titles_id'), [], ['class'=>"form-control",'aria-label'=>"Text input with dropdown button"]) !!}

                            @if ($errors->has('pages_pageTitle'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pages_pageTitle') }}</div>
                                <span class="text-danger">{{ $errors->first('pages_pageTitle') }}</span>
                            @else
                                <div class="valid-feedback">

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {!! Form::submit('Save', ['class' => 'btn btn-primary btn-fw']) !!}
                <a href="{{ route('page.index') }}" class="btn btn-dark">Cancel</a>
                <!--end col-->

                <!--end row-->
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
