<div class="container-fluid py-4 body-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ translate('All Reports.') }}</h5>
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
                                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ translate('Training') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Faculty') }}
                                    </th> -->
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Specialization') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Level') }}
                                    </th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('link') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Course Title') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Report Content') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Reported Date') }}
                                    </th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ translate('Confirmed Date') }}
                                    </th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="min-width:80px;">
                                        {{ translate('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagination as $report)
                                <tr>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0 px-1">{{$report->id}}</p>
                                    </td>
                                    <!-- <td class="text-center pe-1 ">
                                        <p class="text-xs font-weight-bold mb-0">{{$report->training}}</p>
                                    </td>
                                    <td class="text-center pe-1" style="overflow-wrap: anywhere;">
                                        <p class="text-xs font-weight-bold mb-0">{{$report->faculty}}</p>
                                    </td> -->
                                    <!-- <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{ $report->specialization }}</p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{$report->level}}</p>
                                    </td> -->
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0"><a href="{{$report->link}}" class="text-primary">{{$report->link}}</a></p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{{$report->title}}</p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <p class="text-xs font-weight-bold mb-0">{!! nl2br($report->report) !!} </p>
                                    </td>
                                    <td class="text-center pe-1">
                                        <span class="text-secondary text-xs font-weight-bold">{{ agotime($report->reported_at)}}</span>
                                    </td>
                                    <!-- <td class="text-center pe-1">
                                        <span class="text-secondary text-xs font-weight-bold">{{ agotime($report->verified_at) }}</span>
                                    </td> -->
                                    <td class="text-center pe-1">
                                        <!-- <a href="#" 
                                            class="mx-1" data-bs-toggle="tooltip"
                                            data-bs-original-title="agree this report"
                                            wire:click.prevent="$emit('agree_report', '{{$report->id}}')"
                                            >
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a> -->
                                        <span 
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="delete this report"
                                            onclick="ConfirmFunction('{{ translate('Are you sure to delete this report?')}}', delete_report, '{{$report->id}}')">
                                            <i class="cursor-pointer fas fa-trash text-secondary text-xs"></i>
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
function delete_report(del_id)
{
    window.livewire.emit('delete_report', del_id);
}
</script>
<!-- Translate Course Modal -->
@livewire('modal.useredit-modal')

