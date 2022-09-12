@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Performance' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('performances.performance.destroy', $performance->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('performances.performance.index') }}" class="btn btn-primary" title="Show All Performance">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('performances.performance.create') }}" class="btn btn-success" title="Create New Performance">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('performances.performance.edit', $performance->id ) }}" class="btn btn-primary" title="Edit Performance">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Performance" onclick="return confirm(&quot;Click Ok to delete Performance.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Bsc Value</dt>
            <dd>{{ $performance->bsc_value }}</dd>
            <dt>Competency Value</dt>
            <dd>{{ $performance->competency_value }}</dd>
            <dt>Pos Type</dt>
            <dd>{{ $performance->pos_type }}</dd>
            <dt>Employee</dt>
            <dd>{{ optional($performance->employee)->title }}</dd>
            <dt>Yearsetting</dt>
            <dd>{{ optional($performance->yearsetting)->created_at }}</dd>
            <dt>Level</dt>
            <dd>{{ optional($performance->level)->name }}</dd>

        </dl>

    </div>
</div>

@endsection