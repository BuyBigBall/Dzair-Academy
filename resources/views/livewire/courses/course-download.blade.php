<div class="container-fluid py-4 body-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3 col-sm-6 d-flex justify-content-start align-items-center">
                            <h5 class="mb-0">{{ translate('Course Download') }}</h5>
                        </div>
                        <div class="col-md-9 col-sm-6  text-center p-1">
                            <div style='min-height:60px;'>
                                <a href="{{ env('ADVERTISE1_LINK') }}">
                                    <img src="{{ asset('uploads/' . env('ADVERTISE1_URL'))}}"
                                        
                                        />
                                    </a>                                
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 d-flex justify-content-start align-items-center"></div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-1 row col-12">
                        <div
                            class="col-md-3 col-sm-6 text-center d-flex justify-content-start align-items-start">
                            <div style='min-height:50vh;width:100%;'>
                                <a href="{{ env('ADVERTISE2_LINK') }}">
                                    <img src="{{ asset('uploads/' . env('ADVERTISE2_URL'))}}"
                                        
                                        />
                                    </a>                                
                            </div>
                        </div>

                        <!-- #################################### -->
                        <div
                            class="col-md-6 col-sm-6 text-right d-flex justify-content-center align-items-start">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Path row -->
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-start ">
                                            <label class="col-md-3 custom-control-label mt-1 d-flex align-items-start justify-content-end ">{{ translate('Training : ')}}</label>
                                            <span  class="col-md-9 text-left form-label mt-0 px-2 d-flex justify-content-start " id="title">{{$training_string}}</span>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-start ">
                                            <label class="col-md-3 custom-control-label mt-1 d-flex align-items-start justify-content-end ">{{ translate('Faculty : ')}}</label>
                                            <span  class="col-md-9 text-left form-label mt-0 px-2 d-flex justify-content-start " id="title">{{$faculty_string}}</span>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-start ">
                                            <label class="col-md-3 custom-control-label mt-1 d-flex align-items-start justify-content-end ">{{ translate('Specialization : ')}}</label>
                                            <span  class="col-md-9 text-left form-label mt-0 px-2 d-flex justify-content-start " id="title">{{$specialization_string}}</span>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-start ">
                                            <label class="col-md-3 custom-control-label mt-1 d-flex align-items-start justify-content-end ">{{ translate('Level : ')}}</label>
                                            <span  class="col-md-9 text-left form-label mt-0 px-2 d-flex justify-content-start " id="title">{{$level_string}}</span>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-start ">
                                            <label class="col-md-3 custom-control-label mt-1 d-flex align-items-start justify-content-end ">{{ translate('Module : ')}}</label>
                                            <span  class="col-md-9 text-left form-label mt-0 px-2 d-flex justify-content-start " id="title">{{$module_string}}</span>
                                        </div>
                                    
                                    </div>
                                    <!-- End Path row -->

                                    <!-- Title TextBox row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label class="custom-control-label me-3 w-25">{{ __('pages.Title')}}</label>
                                                <div
                                                    class="form-control d-flex justify-content-start align-items-start"
                                                    id="title">{{$title}}</div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Title TextBox row -->
                                    
                                    <!-- Start Description TextBox row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-left">
                                                <label class="custom-control-label me-3 w-25" for="description">{{translate('Description:')}}
                                                </label>
                                                <div
                                                    class="form-control d-flex justify-content-start align-items-start"
                                                    id="description"
                                                    style='min-height:5rem;'><?php print($description); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Description TextBox row -->
                                    
                                    <!-- categories row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label class="custom-control-label me-3 w-25">{{ translate('Categories')}}</label>
                                                <div class="form-control d-flex justify-content-start align-items-start border-0 pt-0"
                                                    id="category">{{$category_string}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End categories row -->

                                    <!-- file informations row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label class="custom-control-label me-3 w-25">{{ translate('File')}}</label>
                                                <div class="form-control d-flex justify-content-start align-items-start border-0 pt-0"
                                                    id="category">
                                                    <table>
                                                    <tr>
                                                            <td class="text-left">{{translate("Name")}}</td>
                                                            <td class="text-left ps-2">{{$file_information['filename']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">{{translate("Type")}}</td>
                                                            <td class="text-left ps-2">{{filetypename($file_information['filetype'])}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">{{translate("Size")}}</td>
                                                            <td class="text-left ps-2">{{size($file_information['filesize'])}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End file informations row -->

                                    @if( !empty($password) )
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-sm-flex align-items-center">
                                                <label for="encryptPassword" class="custom-control-label me-3 w-25">{{translate('password:')}}</label>
                                                <input  class="form-control" id='encryptPassword' type="password" 
                                                        name='encryptPassword' wire:model="encryptPassword" />
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3">
                                            <button wire:click="download" class="btn btn-primary w-200">{{ translate('Download') }}</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-secondary w-200" onclick='history.back(-1);'>{{ translate('Back') }}</button>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #################################### -->

                        <div
                            class="col-md-3 col-sm-6 text-center d-flex justify-content-start align-items-start">
                            <div style='min-height:50vh;width:100%;'>
                                <a href="{{ env('ADVERTISE3_LINK') }}">
                                    <img src="{{ asset('uploads/' . env('ADVERTISE3_URL'))}}"
                                        
                                        />
                                    </a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>