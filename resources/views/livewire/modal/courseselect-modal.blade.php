<div class="modal fade" id="selectCourseModal" tabindex="-1" role="dialog" aria-labelledby="selectCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="selectCourseModalLabel">{{translate('Select Course')}}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">                        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Full Name</label>
                            <div class="">
                                <input wire:model="user.name" class="form-control" type="text" placeholder="Name" id="user-name">
                            </div>
                                                                </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">Email</label>
                            <div class="">
                                <input wire:model="user.email" class="form-control" type="email" placeholder="@example.com" id="user-email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">Phone</label>
                            <div class="">
                                <input wire:model="user.phone" class="form-control" type="tel" placeholder="40770888444" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">University Name</label>
                            <div class="">
                                <input wire:model="user.location" class="form-control" type="text" placeholder="Location" id="name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="about">About Me</label>
                    <div class="">
                        <textarea wire:model="user.about" class="form-control" id="about" rows="3" placeholder="Say something about yourself"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ 'Cancel' }}</button>
            <button type="button" class="btn btn-primary">{{ 'Save' }}</button>
        </div>
        </div>
    </div>
</div>