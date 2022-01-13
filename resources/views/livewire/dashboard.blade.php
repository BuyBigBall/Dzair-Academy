<main class="body-content">
    <div class="container-fluid py-4">

        @livewire("component.user-photo")

        <div class="row">
            <div class="col-md-6 mt-4">
                @livewire("component.added-faculty")
            </div>
            <div class="col-md-6 mt-4">
                @livewire("component.added-specialization")
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-4">
                @livewire("component.added-module")
            </div>
            <div class="col-md-6 mt-4">
                @livewire("component.course-report")
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-4">
                @livewire("component.uploaded-course")
            </div>
            <div class="col-md-6 mt-4">
                @livewire("component.translated-course")
            </div>
        </div>
    </div>
</main>

@livewire('modal.translatematerial-modal')