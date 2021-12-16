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
        id="translateMateralModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="translateMateralModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document" style="max-width:670px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="translateMateralModalLabel">{{translate('Translate material')}}</h5>
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
                            <!-- main title and description -->
                            <div class="col-md-5 col-sm-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mat_title" class="form-control-label">{{translate('Material Title')}}</label>
                                            <div class="">
                                                <input wire:model="mat_title" readonly="true" class="form-control" type="text" placeholder="Title" id="mat_title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mat_description" class="form-control-label">{{translate('Material Description')}}</label>
                                            <div class="">
                                                <textarea wire:model="mat_description" readonly="true" 
                                                    class="form-control" placeholder="Description" 
                                                    row=6 id="mat_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main title and description -->

                            <!-- translated title and description -->
                            <!-- style='height:60vh; overflow-y:scroll;' -->
                            <div class="col-md-7 col-sm-6"   >
                                <!-- English -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lang_title_en" class="form-control-label">{{translate('EN Title')}}</label>
                                            <div class="">
                                                <input wire:model="lang_id_en" class="form-control" type="hidden" id="lang_id_en">
                                                <input wire:model="lang_title_en" class="form-control" type="text" placeholder="Title" id="lang_title_en">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lang_desc_en" class="form-control-label">{{translate('EN Description')}}</label>
                                            <div class="">
                                                <textarea wire:model="lang_desc_en" class="form-control" placeholder="Description" row=3 id="lang_desc_en"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Franch -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lang_title_fr" class="form-control-label">{{translate('FR Title')}}</label>
                                            <div class="">
                                                <input wire:model="lang_id_fr" class="form-control" type="hidden" id="lang_id_fr">
                                                <input wire:model="lang_title_fr" class="form-control" type="text" placeholder="Title" id="lang_title_fr">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lang_desc_fr" class="form-control-label">{{translate('FR Description')}}</label>
                                            <div class="">
                                            <textarea wire:model="lang_desc_fr" class="form-control" placeholder="Description" row=3 id="lang_desc_fr"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arbic -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lang_title_ar" class="form-control-label">{{translate('AR Title')}}</label>
                                            <div class="">
                                                <input wire:model="lang_id_ar" class="form-control" type="hidden" id="lang_id_ar">
                                                <input wire:model="lang_title_ar" class="form-control" type="text" placeholder="Title" id="lang_title_ar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lang_desc_ar" class="form-control-label">{{translate('AR Description')}}</label>
                                            <div class="">
                                            <textarea wire:model="lang_desc_ar" class="form-control" placeholder="Description" row=3 id="lang_desc_ar"></textarea>
                                            </div>
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
                        wire:click.prevent="save()"
                        >{{ 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</div>