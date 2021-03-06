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
    <div
        class="modal fade @if($show === true) show @endif"
        style="display: @if($show === true)
                            block
                        @else
                            none
                        @endif;"
        id="translateMateralModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="translateMateralModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width:670px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="translateMateralModalLabel">{{$title}}</h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        wire:click.prevent="doClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="flex-wrap:nowrap;overflow:auto;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="en_words" class="form-control-label">english</label>
                                    <div class="">
                                    <input type="text" wire:model="en" 
                                            class="form-control" 
                                            id="en_words" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fr_words" class="form-control-label">fran??ais</label>
                                    <div class="">
                                        <input type="text" wire:model="fr" 
                                            class="form-control" 
                                            id="fr_words" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ar_words" class="form-control-label">????????</label>
                                    <div class="">
                                        <input type="text" wire:model="ar" 
                                            class="form-control" 
                                            id="ar_words" />
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
                        wire:click.prevent="doClose()">{{ translate('Cancel') }}</button>
                    <button type="button" class="btn btn-primary" 
                        wire:click.prevent="save()"
                        >{{ translate('Save') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>