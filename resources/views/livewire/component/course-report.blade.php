<div class="card">
    <div class="card-header pb-0 px-3 d-flex justify-content-between">
        <h6 class="mb-0">{{ translate('Course Reports') }}</h6>
        <a href="{{ route('report-view') }}" class="mt-1 text-xs cursor-pointer"> {{ translate('view all') }}</a>
        
    </div>
    <div class="card-body pt-4 p-3">
        <ul class="list-group">
            @foreach($reports as $course_reports)
            <li class="list-group-item border-0 d-flex p-md-3 p-lg-4 p-2 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column w-100">
                    <div class="d-flex mb-0 justify-content-between w-100">
                        <span class="text-sm text-dark ">{{ translate('Course Title:') }}</span>
                        <span class="text-sm  text-secondary">{{$course_reports->course->title}}</span>
                    </div>
                    <div class="d-flex mb-0 justify-content-between w-100">
                        <span class="text-sm text-dark ">{{ translate('Report Content:') }}</span>
                        <span class="text-sm text-primary">{!! nl2br(substr($course_reports->content,0,20)) !!} 
                                                {{ strlen($course_reports->content)>20 ? "..." : "" }}
                        </span>
                    </div>
                    <div class="row align-items-end">
                        <div class="col-8 d-flex flex-column">
                            <span class="mb-2 text-xs">
                                {{ translate('Course Creator:') }} 
                                <span
                                    class="text-dark font-weight-bold ms-2">
                                    <a href="{{route('user-profile', 'user_id='.$course_reports->course->created_by)}}">
                                    {{$course_reports->course->creator->name}}
                                    </a>
                                </span></span>
                            <span class="mb-2 text-xs">{{ translate('Course Repoter:') }} <span
                                class="text-dark font-weight-bold ms-2">
                                <a href="{{route('user-profile', 'user_id='.$course_reports->user->id)}}">
                                    {{$course_reports->user->name}}
                                </a>
                                </span></span>
                            <span class="mb-2 text-xs">{{ translate('Repoter Email:') }} <span
                                    class="text-dark ms-2 font-weight-bold">{{$course_reports->user->email}}</span></span>
                            <span class="text-xs">{{ translate('Reported date:') }} <span
                                    class="text-dark ms-2 font-weight-bold">{{agotime($course_reports->created_at)}}</span></span>

                        </div>

                        <div class="col-4 d-flex">
                            <a class="btn btn-link text-dark px-1 px-md-2 px-lg-3 mb-0" 
                                onclick="ConfirmFunction('{{ translate('Are you sure delete this report?')}}', delete_report, '{{$course_reports->id}}')"
                                ><i class="far fa-trash-alt me-2"></i>{{ translate('delete') }}</a>
                            <a class="btn btn-link text-dark px-1 px-md-2 px-lg-3 mb-0" 
                                onclick="ConfirmFunction('{{ translate('Are you sure?')}}', markAsSeen, '{{$course_reports->id}}')"
                                ><i
                                    class="fas fa-check text-dark me-2" aria-hidden="true"></i>{{ translate('agree') }}</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function delete_report(report_id)
    {
        window.livewire.emit('delete_report', report_id);
    }
    function markAsSeen(report_id)
    {
        window.livewire.emit('agree_report', report_id);
    }
</script>