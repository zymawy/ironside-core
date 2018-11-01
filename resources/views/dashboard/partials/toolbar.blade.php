<div class="{{ App::isLocal('ar')? 'pull-right' : '' }}">
    <div class="card well-toolbar" style="width: 18rem;">
        <a class="btn b-ir-primary m-b-10 m-l-5" href="{{ Request::url().'/create' }}">
            <span class="badge"><i class="fa fa-fw fa-plus"></i></span>Create {{ ucfirst($resource) }}
        </a>

        @if(isset($order) && $order === true)
            <a class="btn b-ir-success m-b-10 m-l-5" href="{{ Request::url().'/order' }}">
                <span class="badge"><i class="fa fa-fw fa-align-center"></i></span>{{ ucfirst($resource) }} Order
            </a>
        @endif
    </div>
</div>