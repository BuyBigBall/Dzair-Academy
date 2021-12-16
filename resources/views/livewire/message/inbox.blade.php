<div class="body-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="col-md-4 col-sm-6 d-flex justify-content-start align-items-center" >
                                <h5 class="mb-0">{{ translate('Received Messages') }}</h5>
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
                    <div class="card-body">
                        <div class="table-responsive row">
                            <!-- #################################### -->
                            <div class="col-md-9 col-sm-6 d-flex justify-content-start align-items-start" >
                                <!-- <div class="row" > -->
                                    <table class="align-items-center mb-0" id='all-messages-table'>
                                        <thead>
                                            <tr>
                                                <th class="pe-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ translate('ID')}}
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    {{ translate('From User')}}
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ translate('Message')}}
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ translate('Received Date')}}
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ translate('Action')}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pe-3 text-center">
                                                    <p class="text-xs font-weight-bold mb-0">1</p>
                                                </td>
                                                <td>
                                                    <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        The Title for Course X goes here and in case 
                                                        it has more than first line  we need ... </p>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">16/06/18</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="mark as read">
                                                        <i class="fa fa-eye-slash text-secondary"></i>
                                                    </a>
                                                    <span>
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                           
                                <!-- </div> -->
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

