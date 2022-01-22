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
                        <span class="text-sm text-dark ">{{ translate('Course url:') }}</span>
                        <span class="text-sm text-dark ">
                            <a class="text-xs" href="{!! $course_reports->link !!}">{!! $course_reports->link !!} </a>
                        </span>
                    </div>
                    <div class="d-flex mb-0 justify-content-between w-100">
                        <span class="text-sm text-dark ">{{ translate('Course Title:') }}</span>
                        <span class="text-sm text-dark">{{$course_reports->course->title}}</span>
                    </div>
                    <div class="d-flex mb-0 justify-content-between w-100">
                        <span class="text-sm text-dark ">{{ translate('Report Content:') }}</span>
                        <span class="text-sm text-primary">{!! nl2br($course_reports->content) !!} </span>
                    </div>
                    
                    <div class="d-flex mb-0 justify-content-between w-100">
                            <span class="col-3 text-sm text-dark ">{{ translate('Reported date:') }} </span>
                            <span class="col-5 text-xs text-dark text-right ms-2 font-weight-bold">{{agotime($course_reports->created_at)}}</span>
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