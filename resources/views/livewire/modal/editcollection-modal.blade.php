<div >
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
<div 
    class="modal fade @if($show === true) show @endif"
        style="display: @if($show === true)
                            block
                        @else
                            none
                        @endif;"
    id="collectionModal" tabindex="-1" role="dialog" aria-labelledby="collectionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="collectionModalLabel">{{translate('Collection Information')}}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                wire:click.prevent="doClose()">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">                        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">{{translate('Collection Name')}}</label>
                            <div class="">
                                <input wire:model="coll_name" class="form-control" type="text" placeholder="Name" id="collection-name">
                                @error('coll_name') <span class="error">{{ translate($message) }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">{{translate('Description')}}</label>
                            <div class="">
                                <textarea wire:model="coll_disp" class="form-control" placeholder="description" row=3 id="collection-description"></textarea>
                                @error('coll_disp') <span class="error">{{ translate($message) }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" 
                wire:click.prevent="doClose()"
                data-bs-dismiss="modal">{{ 'Cancel' }}</button>
            <button type="button" class="btn btn-primary"
                wire:click.prevent="save()"
                >{{ 'Save' }}</button>
        </div>
        </div>
    </div>
</div>   

</div></div>