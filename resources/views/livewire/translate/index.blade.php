<!-- <link rel="stylesheet" type="text/css" href="{{asset('asset/css/dataTables.bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('asset/js/jquery.min.js')}}"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
<main class="body-content">
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-4 col-sm-6 d-flex justify-content-start align-items-center" >
                            <h5 class="mb-0">{{ translate('Translate') }}</h5>
                        </div>
                        <div class="col-md-7 col-sm-6  text-center"  >
                            <div style='background:#C2E2CE; min-height:60px;'>
                                ADS SPOT EXAMPLE 1
                            </div>                        
                        </div>
                        <div class="col-md-1 col-sm-6 d-flex justify-content-start align-items-center" >
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3">
                    <div class="table-responsive row">
                        <!-- #################################### -->
                        <div class="col-md-12 col-sm-6 text-right d-flex justify-content-center align-items-start" >
                            <?php /* <livewire:user-datatables 
                                searchable="name, email"
                                exportable
                            />
                            // */ ?>
                            <table class="col-md-12 col-sm-6 align-items-center mb-0" 
                                id='all-words-table' style="display:table;">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('ID')}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ getSupportedLocales()[0]}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ getSupportedLocales()[1]}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ getSupportedLocales()[2]}}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ translate('Action')}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pagination as $row)
                                    <tr>
                                        <td class="text-center">
                                            <div> <p class="text-xs font-weight-bold mb-0"> {{$row->idx}}</p></div>
                                        </td>
                                        <td class="text-left" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">{{!empty($row->en) ? $row->en : $row->strkey}}</p>
                                            </div>
                                        </td>
                                        <td class="text-center" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">
                                                {{$row->fr}}</p></div>
                                        </td>
                                        <td class="text-right" style='width:25%'>
                                            <div class='cell'>
                                                <p class="text-xs font-weight-bold mb-0">
                                            {{$row->ar}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="mark as read">
                                                <i class="fa fa-edit text-secondary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                           
                        </div>
                        <!-- #################################### -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<!-- 
<script type="text/javascript" src="{{asset('asset/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset/js/jquery-ui.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#all-words-table').DataTable();
} );
</script> -->