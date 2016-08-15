<table class="table table-responsive" id="backends-table">
    <thead>
     <tr>
        <th>Uri</th>
        <th>Name</th>
        <th>Description</th>
        <th>Upstream</th>
        <th colspan="3">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($backends as $backend)
        <tr>
            <td>{!! $backend->uri !!}</td>
            <td>{!! $backend->name !!}</td>
            <td>{!! $backend->description !!}</td>
            <td>{!! $backend->upstream !!}</td>
            <td>
                 <a href="{{ route('admin.backends.show', $backend->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view sample"></i>
                 </a>
                 <a href="{{ route('admin.backends.edit', $backend->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit sample"></i>
                 </a>
                 <a href="{{ route('admin.backends.confirm-delete', $backend->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete sample"></i>
                 </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
@stop