@extends('layout.master')
@section('content')
    <div class="wrapper">
        <div class="card-body">
            <div class="live-preview">
                {!! Form::model($page_Title, [
                    'method'=> 'PATCH',
                    'files' => true,
                    'route' => ['page_titlt.update', $page_Title->page_titles_id],
                    'class' => 'needs-validation',
                    'novalidate',
                ]) !!}
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">Title </label>
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
                <!--end col-->
                {!! Form::submit('Update', ['class' => 'btn btn-primary btn-fw']) !!}
                <a href="{{ route('page.index') }}" class="btn btn-dark">Cancel</a>

                <!--end row-->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
