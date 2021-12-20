<div class="body-content">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="mb-0">{{ translate('Profile Information') }}</h6>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <div style='min-height:60px;'>
                        <a href="{{ env('ADVERTISE1_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                                    style="width:100%; height:100%;"
                                    />
                                </a>                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4 p-3">

                @if ($showDemoNotification)
                <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-text text-white">
                        {{ translate('You are in a demo version, you can\'t update the profile.') }}</span>
                    <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif

                @if ($showSuccesNotification)
                <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text text-white">{{ translate('Your profile information have been successfuly saved!') }}</span>
                    <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-3 pt-4 d-flex justify-content-center text-align-center">
                            <img style='width:180px; height:220px; cursor:pointer;' 
                                    onclick="$('#photo').trigger('click');"
                                    src="{{asset($user->photo);}}"
                                     />
                            <input wire:model="user.photo" type='file' name="photo" id="photo" style='display:none;'>
                        </div>   
                        <div class="col-md-6">                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-name" class="form-control-label">{{ translate('Full Name') }}</label>
                                        <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                            <input wire:model="user.name" class="form-control" 
                                                type="text" placeholder="{{translate('Name')}}" id="user-name">
                                        </div>
                                        @error('user.name') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user-email" class="form-control-label">{{ translate('Email') }}</label>
                                        <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                            <input wire:model="user.email" class="form-control" type="email" placeholder="you@example.com" id="user-email">
                                        </div>
                                        @error('user.email') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.phone" class="form-control-label">{{ translate('Phone') }}</label>
                                        <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                            <input wire:model="user.phone" class="form-control" 
                                                type="tel" placeholder="40770888444" id="phone">
                                        </div>
                                        @error('user.phone') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user.location" class="form-control-label">{{ translate('Univercity')}}</label>
                                        <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                            <input wire:model="user.location" class="form-control" 
                                                type="text" placeholder="{{ translate('univercity name') }}" id="location"
                                                />
                                        </div>
                                        @error('user.location') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="course" class="form-control-label">Course Name</label>
                                        <div class="@error('course') border border-danger rounded-3 @enderror">
                                            <input wire:model="user.course_id" type="hidden" id="course_id" name="course_id"
                                                value="{{$user->course_id}}"
                                                 />
                                            <input class="form-control" 
                                                type="text" placeholder="translate('Select Course')}}" id="course"
                                                readonly
                                                value="{{ ln($user->course) }}"
                                                >
                                        </div>
                                        @error('course') <div class="text-danger">{{ translate($message) }}</div> @enderror
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label for="about">{{ 'About Me' }}</label>
                                <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                    <textarea wire:model="user.about" class="form-control" id="about" rows="3" placeholder="{{translate('Say something about yourself')}}"></textarea>
                                </div>
                                @error('user.about') <div class="text-danger">{{ translate($message) }}</div> @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mt-4 mb-4 mx-2">{{ translate('Save') }}</button>
                                <a href="{{ route('collection-shared-forme') }}" class="btn btn-secondary mt-4 mb-4 mx-2">{{ translate('Shared Collections for me') }}</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div style='min-height:50vh;'>
                                <a href="{{ env('ADVERTISE2_LINK') }}">
                                    <img src="{{ asset('uploads/' . env('ADVERTISE2_URL'))}}"
                                        style="width:100%; height:100%;"
                                        />
                                    </a>                                
                            </div>
                        </div>
                    </div>
                   
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>