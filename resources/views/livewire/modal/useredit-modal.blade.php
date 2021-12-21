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
                    <h5 class="modal-title" id="userInformModalLabel">{{translate('User Information')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" 
                        aria-label="Close"
                        wire:click.prevent="doClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ translate('Full Name')}}</label>
                                    <div class="">
                                        <input wire:model="user.name" class="form-control" type="text" placeholder="Name" id="user-name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ translate('Email')}}</label>
                                    <div class="">
                                        <input
                                            wire:model="user.email"
                                            class="form-control"
                                            type="email"
                                            placeholder="yourself@example.com"
                                            id="user-email"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">{{ translate('Phone')}}</label>
                                    <div class="">
                                        <input wire:model="user.phone"
                                            class="form-control" type="tel" placeholder="40770888444" id="phone"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.location" class="form-control-label">{{ translate('University Name')}}</label>
                                    <div class="">
                                        <input
                                            wire:model="user.location"
                                            class="form-control"
                                            type="text"
                                            placeholder="{{ translate('univercity')}}"
                                            id="name"/>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ translate('User Role')}}</label>
                            <div class="">
                                <select  wire:model="user.role" class="form-control" id="role">
                                    
                                    <option value='user'   >{{ translate('user')  }}</option>
                                    <option value='staff'  >{{ translate('staff') }}</option>
                                    <option value='admin'  >{{ translate('admin') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ translate('About Me')}}</label>
                            <div class="">
                                <textarea
                                    wire:model="user.about"
                                    class="form-control"
                                    id="about"
                                    rows="3"
                                    placeholder="{{ translate('Say something about yourself')}}"></textarea>
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
