@extends('layout.master')
@section('content')
    <div class="wrapper">
        {{-- <?php require_once VIEW_PATH . '/alertMessageView.php'; ?> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href='{{ route('page_titlt.create') }}'><button class="btn btn-primary btn-fw">Insert</button></a>

                    <table class="table table-bordered table-contextual" id="table_id">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php foreach($pageTitle as $page):?>
                        <tbody class="table-info">
                            <td>{{ $page->page_titles_id }} </td>
                            <td>{{ $page->page_titles_name }}</td>
                            <td>
                                <a href="{{route('page_titlt.edit', $page->page_titles_id)}}"><button
                                        class="btn btn-primary btn-fw">Update</button></a>
                                        <form method="POST" action="{{ route('page_titlt.destroy',$page->page_titles_id)}}" >
                                            @csrf
                                            @method('delete')
                                          
                                <button
                                       type="submit" class="btn btn-danger btn-fw show_confirm">Delete </button></form>
                            </td>
                        </tbody><?php endforeach ?>
                       
                    </table>
                    {{ $pageTitle->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
