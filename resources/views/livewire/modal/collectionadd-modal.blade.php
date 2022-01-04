<div>
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
        id="collectionModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="collectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="collectionModalLabel">{{translate('Select Collection to add this file')}}</h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        wire:click.prevent="doClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">{{translate('Description')}}</label>
                                        <div class="">
                                            <select
                                                wire:model="collection_id"
                                                class="form-control"
                                                placeholder="{{ translate('select collection') }}"
                                                size="10"
                                                id="collections">
                                                @foreach($collection_options as $row)
                                                <option value='{{ $row->id }}' 
                                                    >
                                                    <!-- @ i f($collection_id==$row->id) selected @ e ndif  -->
                                                    {{ $row->collection_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        wire:click.prevent="doClose()">{{ 'Cancel' }}</button>
                    <button type="button" class="btn btn-primary" 
                        wire:click.prevent="doAdd()"
                        >{{ 'Add' }}</button>
                </div>
            </div>
        </div>
    </div>

</div>