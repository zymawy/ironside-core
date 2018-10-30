@extends('ironside::layouts.dashboard.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary card-solid">
				<div class="card-header with-border">
					<h3 class="card-title">
						<span><i class="fa fa-table"></i></span>
						<span>List All Articles</span>
					</h3>
				</div>

				<div class="card-body">

					@include('ironside::dashboard.partials.info')
					<hr>
					@include('ironside::dashboard.partials.toolbar')
					<hr>
					<table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
                            <th>Title</th>
                            <th class="desktop">Summary</th>
                            <th>Category</th>
                            <th>Active From</th>
                            <th>Active To</th>
                            <th>Cover Photo</th>
                            <th style="min-width: 100px;">Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($items as $item)
							<tr>
                                <td>{{ $item->title }}</td>
                                <td>{!! $item->summary !!}</td>
                                <td>{{ ($item->category)? $item->category->name:'-' }}</td>
                                <td>{{ format_date($item->active_from) }}</td>
                                <td>{{ isset($item->active_to)? format_date($item->active_to):'-' }}</td>
                                <td>
                                    @if($item->cover_photo)
                                        <a target="_blank" href="{{ $item->cover_photo->url }}">
                                            <img style="height: 50px;" src="{{ $item->cover_photo->urlForName($item->cover_photo->thumb) }}" title="{{ $item->cover_photo->name }}">
                                        </a>
                                    @endif
                                </td>
                                <td>{!! action_row($selectedNavigation->url, $item->id, $item->title, [['image' => '/admin/photos/articles/'.$item->id], 'show', 'edit', 'delete']) !!}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection