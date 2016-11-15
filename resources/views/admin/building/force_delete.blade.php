<form class="pull-right" method="post" action="/admin/buildings/{{$building->id}}">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <input type="hidden" name="force" value="1">
    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ trans('common.forceDelete') }}</button>
</form>
<div class="clearfix"></div>