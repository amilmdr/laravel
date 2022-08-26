@extends('layout.master')
@section('content')
    <div class="wrapper">
        <div class="card-body">
            <div class="live-preview">
                {!! Form::open([
                    'action' => 'PageTitleController@csvFileImportSave',
                    'method' => 'POST',
                    'files' => true,
                    'class' => 'needs-validation',
                    'novalidate',
                ]) !!}
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="firstNameinput" class="form-label">CSV or Excel File</label>
                            {!! Form::file('file', ['class' => 'form-control file-upload-info', 'accept' => '.csv,.xlsx']) !!}
                            @if (@isset($error) && $error->any())
                                <div class="invalid-feedback">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            @if(session()->has('failures'))
                            <table class="table table-danger">
                                <tr>
                                    <th>row</th>
                                    <th>Attribute</th>
                                    <th>Error</th>
                                    <th>value</th>
                                </tr>
                                @foreach (session()->get('failures') as $validation)
                                <tr>
                                    <td> {{ $validation->row() }}</td>
                                    <td>{{ $validation->attribute() }}  </td>
                                    <td>
                                       <ul>
                                        @foreach ($validation->errors() as $e)
                                        <li>{{ $e }}</li>
                                        @endforeach
                                       </ul>
                                    </td>
                                    <td>{{ $validation->values()[$validation->attribute()] }}</td>
                                    
                                </tr>
                                    
                                @endforeach

                            </table>
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
