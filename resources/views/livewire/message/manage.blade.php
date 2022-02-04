<div class="body-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="col-md-4 col-sm-6 d-flex justify-content-start align-items-center" >
                                <h5 class="mb-0">{{ translate('Messages') }}</h5>
                            </div>
                            <div class="col-md-7 col-sm-6  text-center p-1" style='display:;' >
                                <div style='min-height:60px;'>
                                    {!! topAdvertise() !!}
                                </div>                        
                            </div>
                            <div class="col-md-1 col-sm-6 d-flex justify-content-start align-items-center" >
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive row">
                            <!-- #################################### -->
                            <div class="col-md-9 col-sm-6 d-flex justify-content-start align-items-start" >
                                <!-- <div class="row" > -->
                                @include('livewire.message.chattingbody')
                                <!-- </div> -->
                            </div>
                            <!-- #################################### -->
                            
                            <div class="col-md-3 text-center d-flex justify-content-start align-items-start d-none d-lg-block">
                                <div class="w-100" style="min-height:50vh;overflow-x:hidden;">
                                    {!! rightAdvertise() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

