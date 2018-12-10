@extends('ironside::layouts.dashboard.app')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
						<span><i class="fa fa-table"></i></span>
						<span>List All News Categories</span>
					</h3>
				</div>

				<div class="card-body">

					@include('ironside::dashboard.partials.info')

					@include('ironside::dashboard.partials.toolbar')

                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ format_date($item->created_at) }}</td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->name, ['edit', 'delete']) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
@endsection