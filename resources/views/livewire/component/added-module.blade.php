<div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="mb-0">{{  translate("Added Module") }}</h6>
            </div>
            <!-- <div class="col-md-6 d-flex justify-content-end align-items-center">
                <i class="far fa-calendar-alt me-2"></i>
                <small>23 - 30 March 2020</small>
            </div> -->
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        @if( count($new_modules)<=0)
        <h6 class="text-lowercase text-body text-xs font-weight-bolder mb-3 ps-3">no added modules</h6>
        @endif
        <ul class="list-group">
            @foreach($new_modules as $module)
            <li
                class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-top w-100 justify-content-between pe-5">
                    <!-- <button
                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                            class="fas fa-arrow-down"></i></button> -->
                    <div class="d-flex flex-column ms-3">
                        <h6 class="mb-1 text-dark text-sm">{{$module->en}}</h6>
                        <span class="text-xs">{{agotime( $module->created_at)}}</span>
                    </div>
                    <div class="d-flex flex-column ms-3">
                        <h6 class="mb-1 text-dark text-sm">{{$module->fr}}</h6>
                    </div>
                    <div class="d-flex flex-column ms-3">
                        <h6 class="mb-1 text-dark text-sm">{{$module->ar}}</h6>
                    </div>
                    
                </div>
                <div
                    class="d-flex align-items-top text-sm font-weight-bold">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 ms-3 btn-sm d-flex align-items-center justify-content-center"
                        onclick="ConfirmFunction('{{ translate('Are you sure to agree this module?')}}', agreeAddedModule, '{{$module->id}}')"
                        ><i class="fas fa-arrow-up"></i></button>
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-3 btn-sm d-flex align-items-center justify-content-center"
                        onclick="ConfirmFunction('{{ translate('Are you sure to delete this module?')}}', deleteAddedModule, '{{$module->id}}')"
                        ><i
                            class="fas fa-arrow-down"></i></button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>


<script>
    function agreeAddedModule(module_id)
    {
        window.livewire.emit('agree_module', module_id);
    }
    function deleteAddedModule(module_id)
    {
        window.livewire.emit('delete_module', module_id);
    }
</script>