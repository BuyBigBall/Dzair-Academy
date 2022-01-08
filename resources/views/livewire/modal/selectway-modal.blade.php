<div>
    <style>
        input[type=text]
        {
            padding:0.45rem 0.65rem;
        }
    </style>
    <!-- Let's also add the backdrop / overlay here -->
    <div
        class="modal-backdrop fade show"
        id="backdrop"
        style="display: @if($show === true)
                                block
                        @else
                                none
                        @endif;"></div>
    <!-- Modal -->
    <div class="modal fade @if($show === true) show @endif"
        style="display: @if($show === true)
                            block
                        @else
                            none
                        @endif;" id="addConfirmModal" tabindex="-1" role="dialog" aria-labelledby="addConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addConfirmModalLabel">{{translate('Confirm')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id='notice' class="d-flex justify-content-center">
                        <label class="p-3 cursor-pointer" for="addmodule"><input type="radio" name="addway" id="addmodule" class="mt-2 me-1" wire:model="way" value="add-module" checked />add module</label>
                        <label class="p-3 cursor-pointer" for="addother"> <input type="radio" name="addway" id="addother"  class="mt-2 me-1" wire:model="way" value="add-spec" />add specialization or faculty</label>
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click.prevent="doClose()"
                        >{{ translate('Cancel') }}</button>
                    <button type="button" class="btn btn-primary"
                        wire:click.prevent="save()"
                        >{{ translate('Ok') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>