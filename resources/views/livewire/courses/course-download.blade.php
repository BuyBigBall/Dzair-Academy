<div>
    <div class="row">
        <div class="col-12">
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div class="col-md-2 col-sm-6 d-flex justify-content-start align-items-center" >
                        <h5 class="mb-0">{{ translate('Course Download') }}</h5>
                    </div>
                    <div class="col-md-7 col-sm-6  text-center" >
                        <div style='background:#C2E2CE; min-height:60px;'>
                            ADS SPOT EXAMPLE 1
                        </div>                        
                    </div>
                    <div class="col-md-2 col-sm-6 d-flex justify-content-start align-items-center" >
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
                    <div class="col-md-6 col-sm-6 text-right d-flex justify-content-center align-items-end" >
                        <div class="row col-md-12 col-sm-6" >
                            
                            <!-- Path row -->
                            <div class="row col-md-12 col-sm-6"> 
                                <div class="col-md-11 col-sm-6">
                                    <div class="form-group d-sm-flex justify-content-start align-items-start">
                                    <label class="custom-control-label me-3 mt-2  align-items-start">{{ translate('Path')}}</label>
                                    <span class="d-flex justify-content-start mt-2 align-items-start" 
                                                id="title" >{{$training}} / {{$faculty}} / {{$specialization}} / {{$level}}</span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End Path row -->

                            <!-- Title TextBox row -->
                            <div class="row col-md-12 col-sm-6"> 
                                <div class="col-md-11 col-sm-6">
                                    <div class="form-group d-sm-flex align-items-center">
                                    <label class="custom-control-label me-3 w-25">{{ __('pages.Title')}}</label>
                                    <div class="form-control d-flex justify-content-start align-items-start" 
                                                id="title" >{{$title}}</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End Title TextBox row -->
                            
                            <!-- categories row -->
                            <div class="row col-md-12 col-sm-6"> 
                                <div class="col-md-11 col-sm-6">
                                    <div class="form-group d-sm-flex align-items-center">
                                        <label class="custom-control-label me-3 w-25">{{ translate('Categories')}}</label>
                                        <div class="form-control d-flex justify-content-start align-items-start" 
                                                id="category" >{{$category_string}}</div>  
                                    </div>
                                </div>
                            </div>
                            <!-- End categories row -->

                            <div class="row col-md-12 col-sm-6 mt-3">
                                <div class="col-md-11">
                                    <div class="form-group d-sm-flex align-items-left">
                                        <label class="custom-control-label me-3 w-25" 
                                            for="description">{{translate('Description:')}} </label>
                                        <div class="form-control d-flex justify-content-start align-items-start" id="description" 
><?php print($description); ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12 col-sm-6 mt-3">
                                <div class="col-md-11">
                                    <div class="form-group d-sm-flex align-items-center">
                                        <label for="encryptPassword" class="custom-control-label me-3 w-25">{{translate('password:')}}</label>
                                        <input class="form-control" id='encryptPassword' type="password" 
                                                />
                                    </div>
                                </div>
                            </div>


                            <div class="row col-md-12 col-sm-6 mt-3">
                                <div class="col-md-6"></div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100" >{{ translate('Download') }}</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-secondary w-100" >{{ translate('Back') }}</button>
                                </div>
                            </div>        
                            
                            

                        </div>
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

