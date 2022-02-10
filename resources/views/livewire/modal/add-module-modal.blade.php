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
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="en_words" class="form-control-label sm-hide">select training</label>
                                    <div class="">
                                    <select class="form-control" wire:model="training" name='training'>
                                        <option>{{ __('pages.seltraining')}}</option>
                                        @foreach($training_options as $val)
                                        <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="en_words" class="form-control-label sm-hide">select faculty</label>
                                    <div class="">
                                        <select class="form-control" wire:model="faculty" name='faculty'>
                                                    <option>{{ __('pages.selfaculty')}}</option>
                                                    @foreach($faculty_options as $val)
                                                    <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="en_words" class="form-control-label sm-hide">select specialization</label>
                                    <div class="">
                                        <select class="form-control" wire:model="specialization" name='specialization'>
                                                    <option>{{ translate('Select Specialization')}}</option>
                                                    @foreach($specialization_options as $val)
                                                    <option value="{{ $val['id'] }}">{{ lang_item( $val ) }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="en_words" class="form-control-label sm-hide">select level</label>
                                    <div class="">
                                    <select class="form-control" wire:model="level" name='level'>
                                                    <option>{{ translate('Select Level')}}</option>
                                                    @foreach($level_options as $val)
                                                    <option value="{{ $val }}">{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pt-3 pt-sm-2">
                            adding
                                only in one language is required
                                other languages are optional
                            </div>
                            <hr class="mb-3 mb-sm-2" />
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2 mb-sm-1">
                                    <label for="en_words" class="form-control-label sm-hide mb-1">english</label>
                                    <div class="">
                                    <input type="text" wire:model="en" 
                                            class="form-control" 
                                            placeholder="english"
                                            id="en_words" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2 mb-sm-1">
                                    <label for="fr_words" class="form-control-label sm-hide mb-1">français</label>
                                    <div class="">
                                        <input type="text" wire:model="fr" 
                                            class="form-control" 
                                            placeholder="français"
                                            id="fr_words" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2 mb-sm-1">
                                    <label for="ar_words" class="form-control-label sm-hide mb-1">عربي</label>
                                    <div class="">
                                        <input type="text" wire:model="ar" 
                                            class="form-control" 
                                            placeholder="عربي"
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