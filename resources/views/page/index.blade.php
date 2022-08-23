@extends('layout.master')
@section('content')
    <div class="wrapper">
        {{-- <?php require_once VIEW_PATH . '/alertMessageView.php'; ?> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href='{{ route('page.create') }}'><button class="btn btn-primary btn-fw">Insert</button></a>

                    <table class="table table-bordered table-contextual" id="table_id">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Page Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php foreach($pages as $page):?>
                        <tbody class="table-info">
                            <td>{{ $page->pages_id }} </td>
                            <td>{{ $page->pages_title }}</td>
                            <td>{{ $page->pages_slug }}</td>
                            <td>{{ $page->pages_description }}</td>
                            <td>{{ $page->page_titles_name }}</td>
                            <td><img src="{{ asset('images/'.$page->pages_image) }}" width="400" height="400"></td>
                            <td>
                                <a href="{{route('page.edit', $page->pages_id)}}"><button
                                        class="btn btn-primary btn-fw">Update</button></a>
                                        <form method="POST" action="{{ route('page.destroy',$page->pages_id)}}" >
                                            @csrf
                                            @method('delete')
                                          
                                <button  type="submit"   class="btn btn-danger btn-fw show_confirm">Delete </button></form>
                            </td>
                        </tbody>
                       
                        <?php endforeach ?>

                    
                    </table>
                    {{  $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
