<div>
    <div id="myALertModal" 
        class="modal fade @if($show === true) show @endif"
        style="display: @if($show === true) block @else none @endif;"
        tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">{{translate('Alert')}}</h5>
                    <button class="close btn shadow-none"
                            type="button"
                            aria-label="Close"
                            wire:click.prevent="doClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">{{$msg}}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary"
                            type="button"
                            wire:click.prevent="doClose()">{{translate('ok')}}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Let's also add the backdrop / overlay here -->
    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($show === true) block @else none @endif;"></div>
</div>