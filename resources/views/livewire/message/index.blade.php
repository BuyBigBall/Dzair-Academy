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
                            <div class="col-md-8 col-sm-6  text-center p-1" style='display:none;' >
                                <div style='min-height:60px;'>
                                <a href="{{ env('ADVERTISE1_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                                    
                                    />
                                </A>                                

                                </div>                        
                            </div>
                            <div class="col-md-1 col-sm-6 d-flex justify-content-start align-items-center" >
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-1 row col-12 mx-0">
                            <div class="col-md-3 text-center d-flex justify-content-start align-items-start d-none d-lg-block" >
                                <div class="w-100" style='min-height:50vh;'>
                                <a href="{{ env('ADVERTISE2_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE2_URL'))}}"
                                    class="w-100"
                                    />
                                </A>                                

                                </div>
                            </div>

                            <!-- #################################### -->
                            <div class="col-sm-12 col-md-9 col-lg-6 d-flex justify-content-center align-items-start" >
                            <form wire:submit.prevent="sendMessage" action="#" method="POST" 
                                role="form text-left" class="w-100">
                                <div class="justify-content-center align-items-start" >
                                    <!-- Target user row -->
                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label class="custom-control-label me-3 w-25">{{ translate('To')}}</label>
                                                <input wire:model="email" name='email' 
                                                    type="email" Placeholder="user@example.com"
                                                    class="form-control"  
                                                    />                                        

                                                    <div class="form-group d-sm-flex align-items-center">
                                                        @error('email') <span class="error">{{ $message }}</span> @enderror     
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        <!-- <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                @error('email') <span class="error">{{ $message }}</span> @enderror     
                                            </div>
                                        </div> -->
                                    <!-- </div> -->
                                    <!-- End Title TextBox row -->
                                    
                                    <!-- <div class="row"> -->
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
                                    <!-- </div>                             -->
                                    
                                    <!-- <div class="row"> -->
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


                            <div class="col-md-3 text-center d-flex justify-content-start align-items-start d-none d-md-block" >
                                <div class="w-100" style='min-height:50vh;'>
                                        <a href="{{ env('ADVERTISE3_LINK') }}">
                                <img src="{{ asset('uploads/' . env('ADVERTISE3_URL'))}}"
                                    class="w-100"
                                    />
                                </A>                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

