<div class="body-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="col-md-4 col-sm-6 d-flex justify-content-start align-items-center" >
                                <h5 class="mb-0">{{ translate('Send Message to the member') }}</h5>
                            </div>
                            <div class="col-md-7 col-sm-6  text-center" style='display:none;' >
                                <div style='background:#C2E2CE; min-height:60px;'>
                                    ADS SPOT EXAMPLE 1
                                </div>                        
                            </div>
                            <div class="col-md-1 col-sm-6 d-flex justify-content-start align-items-center" >
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-1 row col-12">
                            <div class="col-md-3 col-sm-6 text-center d-flex justify-content-start align-items-start" >
                                <div style='background:#C2E2CE; min-height:50vh;width:100%;'>
                                    ADS SPOT EXAMPLE 2
                                </div>
                            </div>

                            <!-- #################################### -->
                            <div class="col-md-6 col-sm-6 d-flex justify-content-center align-items-start" >
                            <form wire:submit.prevent="sendMail" action="#" method="POST" role="form text-left">
                                <div class="col-md-12 col-sm-6 justify-content-center align-items-start" >
                                    <!-- Target user row -->
                                    <div class="row"> 
                                        <div class="col-md-12 col-sm-6">
                                            <div class="form-group d-sm-flex align-items-center">
                                            <label class="custom-control-label me-3 w-25">{{ translate('To')}}</label>
                                            <input wire:model="email" name='email' 
                                                type="email" Placeholder="user@example.com"
                                                class="form-control"  
                                                />                                        
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                @error('email') <span class="error">{{ $message }}</span> @enderror     
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Title TextBox row -->
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label class="custom-control-label me-3 w-25" for="description">{{translate('Content:')}} </label>
                                                <textarea class="form-control" id="content" 
                                                        wire:model="content" 
                                                        name="content" 
                                                        rows="8"></textarea>
                                                @error('content') <span class="error">{{ $message }}</span> @enderror     
                                            </div>
                                        </div>
                                    </div>                            
                                    
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary mb-0 mx-2">
                                            {{ translate('Send Message') }}
                                        </button>
                                        <button onclick="history.back(-1);" class="btn btn-secondary mb-0 mx-2">
                                            {{ translate('Back') }}
                                        </button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                            <!-- #################################### -->


                            
                            <div class="col-md-3 col-sm-6 text-center d-flex justify-content-start align-items-start" >
                                <div style='background:#C2E2CE; min-height:50vh;width:100%;'>
                                    ADS SPOT EXAMPLE 3
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

