<div class="container-fluid py-4 body-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Users</h5>
                        </div>
                         <!-- Search TextBox row -->
                        <div class="col-md-6 col-sm-6">
                                <!-- <label class="col-md-1 sm-hide" for='word'>{{ translate('Search')}}</label> -->
                                <input class="col-md-5 form-control" id='word'  wire:model="word" name='word' 
                                    Placeholder="{{ __('pages.SearchPlaceholder')}}"
                                    />
                            
                        </div>
                        <!-- End TextBox Box row -->
                        <!-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">{{translate('New')}}</a> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                                @include('livewire.pagination')
                            </div>
                    <div class="table-responsive p-0" style='min-height:50vh'>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('ID') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ translate('Photo') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Name') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Email') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Course') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('role') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Creation Date') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagination as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->idx}}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{userphoto($user->photo)}}" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->username}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->useremail}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->training}} @if(!empty($user->faculty)) / @endif {{$user->faculty}} @if(!empty($user->specialization)) / @endif {{$user->specialization}} @if(!empty($user->course)) / @endif {{$user->course}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->userrole}}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$user->email_verified_at}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:$('#userInformModal').modal('show');" class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span onclick="ConfirmFunction('{{ translate('Are you sure to delete this user?')}}', deleteUser)">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="userInformModal" tabindex="-1" role="dialog" aria-labelledby="userInformModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="userInformModalLabel">{{translate('User Information')}}</h5>
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
<script>
function deleteUser(del_id)
{
    window.livewire.emit('deleteUser', del_id);
}
</script>