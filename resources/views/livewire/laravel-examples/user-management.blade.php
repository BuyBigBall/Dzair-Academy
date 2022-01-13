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
                    <hr />
                    <div class="table-responsive p-0" style='min-height:50vh'>
                        <table class="align-items-center mb-0 w-100">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                        {{ translate('University') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('role') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Creation Date') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width:80px;">
                                        {{ translate('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagination as $user)
                                <tr>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->idx}}</p>
                                    </td>
                                    <td class="pe-1">
                                        <div>
                                            <div class="avatar avatar-sm me-3">
                                                <img src="{{userphoto($user->photo)}}" class="avatar avatar-sm">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center pe-1 ">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->username}}</p>
                                    </td>
                                    <td class="text-center pe-1" style="overflow-wrap: anywhere;">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->useremail}}</p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <?php /* {{$user->training}} @if(!empty($user->faculty)) / @endif {{$user->faculty}} @if(!empty($user->specialization)) / @endif {{$user->specialization}} @if(!empty($user->course)) / @endif {{$user->course}} */?>
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->location }}</p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->userrole}}</p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <span class="text-secondary text-xs font-weight-bold">{{$user->email_verified_at}}</span>
                                    </td>
                                    <td class="text-center pe-1">
                                        <a href="#" 
                                            class="mx-1" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit user"
                                            wire:click.prevent="$emit('ShowUserModal', '{{$user->idx}}')"
                                            >
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span onclick="ConfirmFunction('{{ translate('Are you sure to delete this user?')}}', deleteUser, '{{$user->idx}}')">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    <hr />
                </div>
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
<!-- Translate Course Modal -->
@livewire('modal.useredit-modal')

