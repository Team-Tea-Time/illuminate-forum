@if ($resource->hasPages())
    <div class="panel-footer">
        {{ $resource->links() }}
    </div>
@endif
