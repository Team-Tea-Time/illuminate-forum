<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">{{ trans('sr_nav_label') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="{{ route('forum.home') }}" class="navbar-brand">{{ config('app.name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <form action="{{ route('forum.search') }}" method="POST" class="nav navbar-nav navbar-right navbar-form">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" name="title" id="title" placeholder="{{ trans('forum::input_search') }}" class="form-control">
                </div>
            </form>
        </div>
    </div>
</nav>

<div class="jumbotron text-center" style="background: {{ isset($group->color) ? $group->color : '#AAC2CB' }}">
    <h3>{{ isset($group->name) ? $group->name : trans('forum::forum') }}</h3>
</div>
