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
        id="userInformModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="userInformModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userInformModalLabel">{{translate('University Information')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" 
                        aria-label="Close"
                        wire:click.prevent="doClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">{{ translate('English Name')}}</label>
                            <div class="">
                                <input wire:model="en" 
                                    class="form-control" type="text" placeholder="" id="en-name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">{{ translate('Franch Name')}}</label>
                            <div class="">
                                <input wire:model="fr"
                                    class="form-control" type="text" placeholder="" id="fr-name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ translate('Arabic name')}}</label>
                            <div class="">
                             <input wire:model="ar"
                                            class="form-control" type="text" placeholder="" id="ar-name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ translate('town')}}</label>
                            <div class="">
                                <input wire:model="town"
                                            class="form-control" type="text" placeholder="" id="town"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" 
                        data-bs-dismiss="modal"
                        wire:click.prevent="doClose()"
                        >{{ translate('Cancel') }}</button>
                    <button type="button" 
                        wire:click.prevent="save()"
                        class="btn btn-primary">{{ translate('Save') }}</button>
                </div>
            </div>
        </div>
    </div>

</div>
