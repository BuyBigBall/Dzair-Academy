<div class="row">
    @foreach($newPhoto_users as $user)
    <div class="col-sm-4 col-md-3 col-lg-2">
        <div class="card mb-2">
            <div class="card-header mx-4 p-3 text-center">
                <div
                    class="icon icon-shape icon-lg text-center">
                    <img src="{{ asset('uploads/' . $user->photo ) }}"
                        class="w-100 h-100 border-radius-lg"
                        />
                </div>
            </div>
            <div class="card-body pt-0 p-3 text-center">
                <h6 class="text-center mb-0">{{ $user->name }}</h6>
                <!-- <span class="text-xs">Belong Interactive</span> -->
                <hr class="horizontal dark my-3">
                <div class="d-flex justify-content-center">
                    <button 
                        onclick="ConfirmFunction('{{ translate('Are you sure to agree this user photo?')}}', agreeUserPhoto, '{{$user->id}}')"
                        class="btn btn-primary   mx-2 p-2" >{{translate('agree')}}</button>
                    <button 
                        onclick="ConfirmFunction('{{ translate('Are you sure to reject this user photo?')}}', rejectUserPhoto, '{{$user->id}}')"
                        
                        class="btn btn-secondary mx-2 p-2" >{{translate('reject')}}</button>
                </div>
            </div>
        </div>
    </div>    
    @endforeach
</div>    
<script>
    function agreeUserPhoto(user_id)
    {
        window.livewire.emit('agree_photo', user_id);
    }
    function rejectUserPhoto(user_id)
    {
        window.livewire.emit('reject_photo', user_id);
    }
</script>